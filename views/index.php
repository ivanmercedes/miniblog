

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <?php foreach($blogpost as $post ){ ?>
                
                <div class="blog-post">
                    <h2><?= $post['title']; ?></h2>
                    <p>Jan 1, 2020 by <a href="">Jose</a> </p>
                    <div class="blog-post-image">
                        <img class="img-fluid" src="https://ichef.bbci.co.uk/news/976/cpsprodpb/12A9B/production/_111434467_gettyimages-1143489763.jpg" alt="">
                    </div>
                    <div class="blog-post-content">
                        <p><?= $post['content']; ?></p>
                    </div>
                </div>
                
                
                <?php } ?>
            </div>
            <div class="col-md-4">
                siderbar
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <footer>
                    this footer
                    <a href="<?=BASE_URL;?>admin">Admin Panel</a>
                </footer>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>