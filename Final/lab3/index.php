<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation LAB</title>
</head>

<body>

<h2>WEB TECHNOLOGIES</h2>
<h3>PHP Form Validation LAB</h3>

<?php
$name = $email = $gender = $blood = "";
$dd = $mm = $yy = "";
$degree = [];

$nameErr = $emailErr = $dobErr = $genderErr = $degreeErr = $bloodErr = "";

function test_input($data)
{
    return trim($data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // NAME
    if (empty($_POST["name"])) {
        $nameErr = "Name cannot be empty";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z][a-zA-Z .-]*$/", $name)) {
            $nameErr = "Invalid name format";
        } elseif (str_word_count($name) < 2) {
            $nameErr = "Name must contain at least two words";
        }
    }

    // EMAIL
    if (empty($_POST["email"])) {
        $emailErr = "Email cannot be empty";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // DOB
    if (empty($_POST["dd"]) || empty($_POST["mm"]) || empty($_POST["yy"])) {
        $dobErr = "Date of birth cannot be empty";
    } else {
        $dd = $_POST["dd"];
        $mm = $_POST["mm"];
        $yy = $_POST["yy"];
        if ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yy < 1953 || $yy > 1998) {
            $dobErr = "Invalid date";
        }
    }

    // GENDER
    if (empty($_POST["gender"])) {
        $genderErr = "At least one gender must be selected";
    } else {
        $gender = $_POST["gender"];
    }

    // DEGREE
    if (empty($_POST["degree"]) || count($_POST["degree"]) < 2) {
        $degreeErr = "At least two degrees must be selected";
    } else {
        $degree = $_POST["degree"];
    }

    // BLOOD GROUP
    if (empty($_POST["blood"])) {
        $bloodErr = "Blood group must be selected";
    } else {
        $blood = $_POST["blood"];
    }
}
?>

<form method="post">

<!-- NAME -->
<fieldset style="width:500px;">
<legend><b>NAME</b></legend>
<input type="text" name="name" style="width:95%;" value="<?php echo $name; ?>">
<br><br>
<span style="color:red;"><?php echo $nameErr; ?></span>
</fieldset>
<br>

<!-- EMAIL -->
<fieldset style="width:500px;">
<legend><b>EMAIL</b></legend>
<input type="text" name="email" style="width:95%;" value="<?php echo $email; ?>">
<br><br>
<span style="color:red;"><?php echo $emailErr; ?></span>
</fieldset>
<br>

<!-- DOB -->
<fieldset style="width:500px;">
<legend><b>DATE OF BIRTH</b></legend>
DD <input type="text" name="dd" size="2" value="<?php echo $dd; ?>">
MM <input type="text" name="mm" size="2" value="<?php echo $mm; ?>">
YYYY <input type="text" name="yy" size="4" value="<?php echo $yy; ?>">
<br><br>
<span style="color:red;"><?php echo $dobErr; ?></span>
</fieldset>
<br>

<!-- GENDER -->
<fieldset style="width:500px;">
<legend><b>GENDER</b></legend>
<input type="radio" name="gender" value="Male"> Male
<input type="radio" name="gender" value="Female"> Female
<input type="radio" name="gender" value="Other"> Other
<br><br>
<span style="color:red;"><?php echo $genderErr; ?></span>
</fieldset>
<br>

<!-- DEGREE -->
<fieldset style="width:500px;">
<legend><b>DEGREE</b></legend>
<input type="checkbox" name="degree[]" value="SSC"> SSC
<input type="checkbox" name="degree[]" value="HSC"> HSC
<input type="checkbox" name="degree[]" value="BSc"> BSc
<input type="checkbox" name="degree[]" value="MSc"> MSc
<br><br>
<span style="color:red;"><?php echo $degreeErr; ?></span>
</fieldset>
<br>

<!-- BLOOD GROUP -->
<fieldset style="width:500px;">
<legend><b>BLOOD GROUP</b></legend>
<select name="blood">
<option value="">Select</option>
<option>A+</option><option>A-</option>
<option>B+</option><option>B-</option>
<option>O+</option><option>O-</option>
<option>AB+</option><option>AB-</option>
</select>
<br><br>
<span style="color:red;"><?php echo $bloodErr; ?></span>
</fieldset>
<br>

<input type="submit" value="Submit">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" &&
empty($nameErr) && empty($emailErr) && empty($dobErr) &&
empty($genderErr) && empty($degreeErr) && empty($bloodErr)) {

echo "<h3>Your Input:</h3>";
echo "Name: $name<br>";
echo "Email: $email<br>";
echo "DOB: $dd/$mm/$yy<br>";
echo "Gender: $gender<br>";
echo "Degree: ".implode(", ", $degree)."<br>";
echo "Blood Group: $blood<br>";
}
?>

</body>
</html>
