<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
</head>
<br><br>
<h2 style="text-align: center;"> FAQ (Frequetly Asked Questions) </h2>
<br>
<div class="container h-100">
    <div class="row">
    <?php
                            $i = 1;
                            foreach ($faq as $d) :

                            ?>
        <div class="col-10 mx-auto">
            <div class="accordion" id="faqExample">
                <div class="card">
                    <div class="card-header p-2" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapse<?= $i ?>" aria-expanded="true" aria-controls="collapseOne">
                            • &nbsp  <?= $d['pertanyaan'] ?></button>
                          </h5>
                    </div>

                    <div id="collapse<?= $i ?>" class="collapse" aria-labelledby="headingOne" data-parent="#faqExample">
                        <div class="card-body">
                            <b>Jawab:</b> <?= $d['jawaban'] ?>
                        </div>
                    </div>
            </div>

        </div>
    </div>
    <?php $i++;
    endforeach ?>
    <!--/row-->
</div>
<!--container-->