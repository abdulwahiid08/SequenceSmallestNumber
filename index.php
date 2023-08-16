<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CDN -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

   <title>Test Case Soal 1 | PT. Garuda Cyber Security</title>
</head>

<body>
   <div class="container mt-5">
      <div class="title-form">
         <h1>Sequence of M and N</h1>
      </div>
      <div class="row">
         <div class="col-md-4">
            <form action="" method="post">
               <div class="form-group">
                  <label for="sequence">Input Sequence (M, N)</label>
                  <input type="text" class="form-control" id="sequence" name="sequence">
               </div>
               <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            <?php
            function sequenceSmallestNumber($arr)
            {
               $sequenTerbesar = 0;  // Menampung angka terbesar dari sequence
               $sequenTerakhir = 0;  // Menampung angka terakhir
               $result = ''; // Menyimpan hasil 

               // Cek panjang sequence
               if (strlen($arr) > 8) {
                  return $result = 'Max sequence 8 karakter';
               }

               // Looping Sequence
               for ($i = 0; $i < strlen($arr); $i++) {
                  $sequenceM = 0;  // Menampung sequence 'M'

                  switch ($arr[$i]) {
                     case 'N':
                        $j = $i + 1; // $i ditambah satu, supaya dimulai dari 1, bukan 0.

                        // Mencari letak sequence 'M' setelah 'N'
                        while ($j < strlen($arr) && $arr[$j] == 'M') {
                           $sequenceM++;
                           $j++;
                        }

                        if ($i == 0) {
                           $sequenTerbesar = $sequenceM + 2;

                           $result .= " " . ++$sequenTerakhir . " " . $sequenTerbesar;
                        } else {
                           $sequenTerbesar = $sequenTerbesar + $sequenceM + 1;

                           $sequenTerakhir = $sequenTerbesar;
                           $result .= " " . $sequenTerakhir;
                        }

                        // Cek angka jika lebih besar dari 9
                        if ($sequenTerbesar > 9) {
                           $result = 'Batas angka terlampaui';
                           return $result;
                        }

                        break;

                     case 'M':
                        if ($i == 0) {
                           $j = $i + 1;
                           while ($j < strlen($arr) && $arr[$j] == 'M') {
                              $sequenceM++;
                              $j++;
                           }

                           $sequenTerbesar = $sequenceM + 2;

                           if ($sequenTerbesar > 9) {
                              $result = 'Batas angka terlampaui';
                              return $result;
                           }

                           $result .= " " . $sequenTerbesar . " " . $sequenTerbesar - 1;
                           $sequenTerakhir = $sequenTerbesar - 1;
                        } else {

                           if ($sequenTerakhir - 1 < 1) {
                              $result = 'Batas angka terlampaui';
                              return $result;
                           }

                           $result .= " " . $sequenTerakhir - 1;
                           $sequenTerakhir--;
                        }
                        break;

                     default:
                        $result = 'Oppss! Huruf Tidak Dikenali';
                        break;
                  }
               }
               return $result;
            }

            // Jika submit itu ada
            if (isset($_POST['submit'])) {
               $data = $_POST['sequence'];
               $result = sequenceSmallestNumber($data);
            }
            ?>
            <!-- Card Result -->
            <div class="card mt-3">
               <div class="card-header">
                  Hasil Sequence
               </div>
               <div class="card-body">
                  <?php if (isset($data) || isset($result)) { ?>
                     <b>Input:</b> <?= $data; ?> <b>Output: </b> <?= $result; ?>
                  <?php }; ?>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Script Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>