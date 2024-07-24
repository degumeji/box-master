
<style>
    .cont {
        width: 24%;
    }
    .txtArea{
        width: 324% !important;
        height: 10% !important;
    }
    .btn {
        width: 76%;
    }
    .tabla{
        width: 60%; 
        margin-top: 0%;
        margin-left: 2%;
    }
    .button {
        margin-top: 1%;
    }
    .h1Central{
        text-align: center;
    }
    textarea {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;

        width: 100%;
        height: 60%;
        resize: none;
    }
    @media only screen and (max-width: 600px) {
        .cont {width: 100%;}
        .txtArea{
            width: 100% !important;
            height: 6% !important;
        }
        .final {
            margin-bottom: 0%;
        }
        .espacioFinal{
            margin-bottom: 28%;
        }
        .tabla{
            width: 100%; 
            margin-top: 0%;
            margin-left: 0%;
        }
        .button {
            margin-top: 1%;
        }
        .h1Central{
            text-align: center;
            margin-left: 0%;
        }
    }
</style>

<div class="col-sm-6 col-md-12 tabla">

    <form class="form">

        <div class="container">

            <div class="row">

                <div class="col-md-12">
                    <h1 class="h1Central">Horarios y Entrenamientos</h1>
                </div>

            </div>
            
            <br>

            <div class="row">

                <div class="col-md-4">
                    <!--label class="form-label" for="txtDia">Día:</label-->
                    <input type="date" id="txtDia" class="form-control" value="<?php echo date('Y-m-d')?>" readonly/>                    

                </div>

            </div>

            <br>

            <div class="row">

                <div class="col-md-12">
                    <textarea name="txtProgramacion" id="txtProgramacion" readonly></textarea>
                </div>
                
            </div>

        </div>
        
    </form>
</div>