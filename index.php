<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: rgb(246, 246, 246);">

<button style="margin:20px;" type="button" class="btn btn-secondary" onclick="window.location.href='afichage.php'">Secondary</button>




<div style="display: flex;justify-content: center;">

<form style="width:550px;margin:100px;background-color: rgb(255, 255, 255); border-radius: 10px;" method="POST" action="./src/databais/conn.php">
    <input style="width:500px;margin:20px;" class="form-control form-control-lg" type="text" placeholder="name" aria-label=".form-control-lg example" name="accountNama">
    <input style="width:500px;margin:20px;" class="form-control form-control-lg" type="email" placeholder="email" aria-label=".form-control-lg example" name="email">
    <input style="width:500px;margin:20px;" class="form-control form-control-lg" type="number" placeholder="balannce" aria-label=".form-control-lg example" name="balannce">
    <select style="width:500px;margin:20px;" id="accountType" class="form-select" aria-label="Default select example"name="accountType">
        <option selected >chose Account</option>
        <option value="business">Business Account</option>
        <option value="current">current Account</option>
        <option value="saving">Savings Account</option>
    </select>

    <input style="width:500px;margin:20px;display:none;" id="saving" class="form-control form-control-lg" type="number" placeholder="interest" aria-label=".form-control-lg example"name="interestRate">
    <input style="width:500px;margin:20px;display:none;" id="saving1" class="form-control form-control-lg" type="number" placeholder="interest" aria-label=".form-control-lg example"name="interestRate1">
    <input style="width:500px;margin:20px;display:none;" id="current" class="form-control form-control-lg" type="number" placeholder="overdraftLimit" aria-label=".form-control-lg example"name="overdraftLimit">
    <input style="width:500px;margin:20px;display:none;" id="current1" class="form-control form-control-lg" type="number" placeholder="overdraftLimit" aria-label=".form-control-lg example"name="overdraftLimit1">
    <input style="width:500px;margin:20px;display:none;" id="business" class="form-control form-control-lg" type="number" placeholder="transactionFee" aria-label=".form-control-lg example"name="taskTransaction">
    <input style="width:500px;margin:20px;display:none;" id="business1" class="form-control form-control-lg" type="number" placeholder="transactionFee" aria-label=".form-control-lg example"name="taskTransaction1">

   

    <button style="width:500px;margin:20px;" type="submit" name="submit" class="btn btn-primary">add accunt</button>
</form> 
</div>




<script>
    document.getElementById('accountType').addEventListener('change', function() {
   
   const selectedType = this.value;
   switch(selectedType) {
       case 'saving':
           document.getElementById('saving').style.display = 'block';
           document.getElementById('saving1').style.display = 'block';
           break;
       case 'current':
           document.getElementById('current').style.display = 'block';
           document.getElementById('current1').style.display = 'block';
           break;
       case 'business':
           document.getElementById('business').style.display = 'block';
           document.getElementById('business1').style.display = 'block';
           break;
   }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</body>
</html>