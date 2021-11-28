@extends('layouts.app')

@section('content')
<!--
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Rubik", sans-serif;
        letter-spacing: 0.4px;
    }
    body {
        background-color: #f3f3f3;
        height: 100%;
        background: linear-gradient(
            135deg, 
            #6f6df4,
            #4c4af4
        ) fixed;
        background-size: 100% 50%;
        background-repeat: no-repeat;
    }
    .container{
        background-color: #ffffff;
        width: 450px;
        padding: 50px 40px;
        border-radius: 10px;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        box-shadow: 0 30px 50px rgb(0,0,0,0.1);
    }
    .wrapper{
        display: flex;
        align-items: center;
        margin: 12px 0;
        justify-content: space-between;
       

    }
    .lbl{
        font-size: 16px;
        color: #44475b;
        font-weight: 500;

    }
    .val{
        font-size: 18px;
        color: #44475b;
        font-weight: 600;

    }
    .input-box{
        background-color: #cdccfd;
        color: #6d6ff4;
        padding: 5px;
    }
    #bill{
        background-color: transparent;
        border: none;
        outline: none;
        width: 100px;
        text-align: right;
        color: #6d6ff4;


    }
    hr{
        border: none;
        border-bottom: 1px solid #cdccfd
    }
    input[type=range]{
        width: 100%;
        cursor: pointer;
    }

    input[type=range]:not(:last-child){
        margin-bottom: 5px;

    }

    section:not(:last-child){
        margin-bottom: 40px; 
    }

    section:not(:first-child){
        margin-top: 40px; 
    }

    section:last-child{
        background-color: #cdccfd;
        padding: 10px;
        border-radius: 5px;
    }

    section:last-child .val,
    section:last-child .lbl{
        color: #6d6ff4;
    }
</style>
-->
    <div class="header_simul">
    </div>
    <div class="body_simul">
        <div class="container_simul">
            <section>
                <div class="form-group slidecontainer mb-3">
                    <label for="range2" class="lbl">Montant pret: </label>
                    <div class="input-group">
                    <input type="text" class="form-control" name="mnt_pret" id="mnt_pret" placeholder="Montant du pret" aria-describedby="inputGroupPrepend2" required>
                    <div class="input-group-prepend">
                        <span class="input-group-text">XOF</span>
                    </div>
                    </div>
                </div>

                <div class="wrapper">
                    <label for"duree_pret" class="lbl">
                        Durée du pret
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

        <div class="container_result">

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







