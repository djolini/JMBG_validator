<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>JMBG validator</title>
  </head>
  <body>
      <div class="text-center">
        <div id="poruka">

        </div>
        <div class="container">
              <h2>Validator</h2>

              <form class="mojaForma" action="../Controller/index.php" method="post">
                    <div class="form-group">
                        <label for="ime"> Ime </label>
                        <input type="text" class="form-control" placeholder="Unesite Vase ime" name="ime" required>
                    </div>

                    <div class="form-group">
                        <label for="prezime"> Prezime </label>
                        <input type="text" class="form-control" placeholder="Unesite Vase prezime" name="prezime" required>
                    </div>

                    <div class="form-group">
                        <label for="jmbg"> JMBG </label>
                        <input type="text" class="form-control" placeholder="Unesite svoj JMBG" name="jmbg" required>
                    </div>

                    <div class="form-group">
                        <label for="sel1">Odaberite Vasu omiljenu boju</label>
                        <select class="form-control" name="omiljena_boja">
                        <?php
                         $boje = array('Crvena','Crna','Bela','Narandzasta','Ljubicasta','Roze','Zuta','Braon','Plava','Zelena');
                         foreach ($boje as $boja ) {
                           echo "<option value='$boja'> $boja </option>";
                         }
                        ?>
                        </select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Posalji</button>
              </form>
          </div>
      </div>

    <script>
      $(document).ready(function() {
        $(".mojaForma").submit(function(e) {
          $("#poruka").empty();
            e.preventDefault();

            $.ajax( {
              url: '../Controller/index.php',
              type : 'POST',
              data: $(".mojaForma").serialize(),

              success: function(data){
                console.log(data);
                let obj = JSON.parse(data);
                if(obj.status==true) {
                  $("#poruka").append("<div class='alert alert-success'><b>" + obj.poruka + "</b></div>");
                } else {
                  $("#poruka").append("<div class='alert alert-danger'><b>" + obj.poruka + "</b></div>");
                }
              }
            })
            })

      })
    </script>
  </body>
</html>
