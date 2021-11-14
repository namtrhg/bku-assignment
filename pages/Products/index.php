<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Bootstrap5 CDN import -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
  </head>
  <body>
    <div class="container my-5 py-5 bg-light border">
      <h1 class="fw-light text-center">Top Software Engineering Job</h1>

      <div class="album py-5">
        <div class="container">
          <div
            class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3"
            id="job_list"
          >
            <script>
              function renderJob() {
                let job_list = "";
                for (let index = 0; index < 20; index++) {
                  job_list += `<div class="col"><div class="card shadow-sm">
                <img src="data:image/png;base64,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" class="img-thumbnail"></img>
                <div class="card-body">
                  <a href="#" class="text-decoration-none">
                    <h5 class="card-title">Java Senior Developer</h5>
                  </a>
                  <p class="card-text"><span class="fas fa-map-marker-alt"></span> Ho Chi Minh City</p>
                  <p class="car-text"><span class="fas fa-usd-square"></span> 1800-2500 $</p>
                </div>
              </div>
            </div>`;
                }
                document.getElementById("job_list").innerHTML = job_list;
              }
              renderJob();
            </script>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
