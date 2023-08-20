
<?php
class GeomatricShape{
    public function area(){

    }
}
class Circle extends GeomatricShape{
     private $radious;
     public function __construct($radious)
     {
        $this->radious = $radious;
     }
     public function areaofcircle(){
        return 3.1416*$this->radious**2;
     }
}
class Rectangle extends GeomatricShape{
    private $width;
    private $height;
    public function __construct($width,$height){
        $this->width = $width;
        $this->height = $height;

    }
    public function areaofrectangle(){
        return $this->width * $this->height;

    }

}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["radius"])) {
        $radius = floatval($_POST["radius"]);
        $circle = new Circle($radius);
        $area = $circle->areaofcircle();
        $_SESSION["circle_area"] = $area;
 
    }
}
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["width"]) && isset($_POST["height"])){
            $width = floatval($_POST['width']);
            $height = floatval($_POST['height']);
            $Rectangle = new Rectangle($width,$height);
            $area_of_rectangle = $Rectangle->areaofrectangle();
     
        }
    
    
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    

     <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-4">
            <form method="post">
                <div class="card">
                    <div class="card-header">
                        <h3>Area Of Circle</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Radious Of the Circle</label>
                            <input type="text" name="radius" class="form-control">

                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Calculate The Area Of the Circle</button>
                        </div>
                    </div>
                </div>
</form>
<?php if (isset($_SESSION["circle_area"])) : ?>
            <p>Circle Area: <?php echo $_SESSION["circle_area"]; ?></p>
            <?php unset($_SESSION["circle_area"]); ?>
        <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <form action="" method="POST">
                <div class="card">
                    <div class="card-header">
                        <h3>Area Of Rectangle</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Width Of the Area</label>
                            <input type="text" name ="width" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter Height Of the Area</label>
                            <input type="text" name ="height" class="form-control" required>
                        </div>
                        <div class="mb-3">
                          <button type="submit" class="btn btn-primary">Calculate Area Of The Rectangle</button>
                        </div>
                    </div>
                    </form>
                <?php
                if(isset($area_of_rectangle)):

                ?>
                 
                </div>
                <p>Area Of Rectangle: <?php echo $area_of_rectangle; ?></p>
        <?php endif; ?>
            </div>
        </div>
     </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>