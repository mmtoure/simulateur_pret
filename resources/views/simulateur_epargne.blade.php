@extends('layouts.app')

@section('content')

    <div class="header_simul">

    </div>
    <div class="body_simul">
        <div class="container_simul">
            <section>
                <h5>Simulateur Epargne</h5>
                <div class="form-group slidecontainer mb-3">
                    <label for="range2" class="lbl">Montant du dépot: </label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="mnt_pret" id="mnt_pret" placeholder="Montant du dépot" aria-describedby="inputGroupPrepend2" required>
                    <div class="input-group-prepend">
                        <span class="input-group-text">XOF</span>
                    </div>
                    </div>
                </div>

                <div class="wrapper">
                    <label for"tip" class="lbl">
                        Durée
                    </label>
                    <span id= "duree_pret" class="val">
                        0
                    </span>
                </div>
                <input type="range" min="1" value="1" max="30" class="val" id="range_duree_pret" >   

                <div class="form-group slidecontainer mb-3">
                    <label for="range2" class="lbl">Taux d'interet: </label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="taux_interet" id="input_taux_interet" placeholder="Taux d'interet" aria-describedby="inputGroupPrepend2" required>
                    <div class="input-group-prepend">
                        <span class="input-group-text">%</span>
                    </div>
                    </div>
                </div>

                <div class="form-group slidecontainer mb-3">
                    <label for="range2" class="lbl" >Taux assurance: </label>
                    <div class="input-group">
                    
                    <input type="text" class="form-control" name="taux_assurance" id="input_taux_assurance" placeholder="Taux assurance" aria-describedby="inputGroupPrepend2" required>
                    <div class="input-group-prepend">
                        <span class="input-group-text">%</span>
                    </div>
                    </div>
                </div>
            </section>

            <button class="btn btn-primary" id="mybutton">Lancer la simulation</button>
        </div>

        <div class="container_result" id="container_result">

            <div class="ls-result-monthly">
                <h4 class="center text-black">
                    Mensualités
                    <a data-toggle="popover" tabindex="-1" role="button" data-content="Capital amorti + intérêts + assurance groupe" title="" data-original-title="Mes mensualités">
                        <i class="glyphicon glyphicon-info-sign"></i>
                    </a>
                </h4>
                <p class="monthly-price center">
                    <span class="colored-price center">
                        <span id= "mnt_mensuel"></span>
                        <small>X0F/mois</small>
                    </span>
                </p>
            </div>

            <span class="table-title">COUT DE L'OPERATION</span>
            <div class="col-xs-12">
                <span class="space-bar"></span>
            </div>
            <div id="resultat" class="resultat_op" style="display: block;">

            
                <p id="Montant" class="Montant-4700">
                    <span class="label">Montant emprunt </span>(XOF)
                    <span class="span_value" id= "val_mnt_pret"></span>
                </p>
                <hr class="hr_simul">
                <p id="DureeCred" class="DureeCred">
                    <span class="label">Durée pret </span> (mois)
                    <span class="span_value" id="duree_mois"></span>
                </p>
                <hr class="hr_simul">
                <p id="interet" class="Taux-4700">
                    <span class="label">Interet</span>
                    <span class="span_value" id="mnt_interet"></span>
                </p>
                <hr class="hr_simul">

                <p id="assurance" class="Taux-4700">
                    <span class="label">Assurance</span>
                    <span class="span_value" id="mnt_assurance"></span>
                </p>
                <hr class="hr_simul">

                <p id="CoutTotal" class="CoutTotal-4700">
                    <span class="label">Cout total</span>
                    <span class="span_value" id="cout_total"></span>
                </p>
                <hr class="hr_simul">

               
                

            </div>
        </div>
    </div>

@endsection







