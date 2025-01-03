<?php
/*
    $data = $menuel['elements']
*/

if(!function_exists('renderDropdown')){
    function renderDropdown($data){
        if(array_key_exists('slug', $data) && $data['slug'] === 'dropdown'){
            echo '<li class="c-sidebar-nav-dropdown">';
            echo '<a class="c-sidebar-nav-dropdown-toggle" href="#">';
            if($data['hasIcon'] === true && $data['iconType'] === 'coreui'){
                echo '<i class="' . $data['icon'] . ' c-sidebar-nav-icon"></i>';    
            }
            echo $data['name'] . '</a>';
            echo '<ul class="c-sidebar-nav-dropdown-items">';
            renderDropdown( $data['elements'] );
            echo '</ul></li>';
        }else{
            for($i = 0; $i < count($data); $i++){
                if( $data[$i]['slug'] === 'link' ){
                    echo '<li class="c-sidebar-nav-item">';
                    echo '<a class="c-sidebar-nav-link" href="' . url($data[$i]['href']) . '">';
                    echo '<span class="c-sidebar-nav-icon"></span>' . $data[$i]['name'] . '</a></li>';
                }elseif( $data[$i]['slug'] === 'dropdown' ){
                    renderDropdown( $data[$i] );
                }
            }
        }
    }
}
?>


        <div class="c-sidebar-brand">
            <img class="c-sidebar-brand-full" src="{{ url('/assets/brand/coreui-base-white.svg') }}" width="118" height="46" alt="CoreUI Logo">
            <img class="c-sidebar-brand-minimized" src="{{ url('assets/brand/coreui-signet-white.svg') }}" width="118" height="46" alt="CoreUI Logo">
        </div>
        <ul class="c-sidebar-nav">

                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="/dashboard">
                            
                            <i class="cil-speedometer
                             c-sidebar-nav-icon"></i> Dashboard
                        </a>
                    </li>
        
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="/categories">
                            <i class="cil-list-rich c-sidebar-nav-icon"></i> Catégories
                        </a>
                    </li>
                    
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="/produits">
                            <i class="c-sidebar-nav-icon"></i> Produits
                        </a>
                    </li>
                
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="/notes">
                            <i class="c-sidebar-nav-icon"></i> Notes
                        </a>
                    </li>
        
        </ul>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
    </div>