<!DOCTYPE html>
<html>
<head>
    <title>PHP Form Validation Lab 3.2</title>
</head>
<body>

<h1>PHP Form Validation</h1>

<?php
// initialize variables
$name = $email = $dob = "";
$nameErr = $emailErr = $dobErr = "";
$genderErr = $degreeErr = $bloodErr = "";

// function for cleaning input
function test_input($data)
{
    $data = trim($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    /* 1. NAME VALIDATION */
    if (empty($_POST["name"]))
    {
        $nameErr = "Name is required";
    }
    else
    {
        $name = test_input($_POST["name"]);

        if (!preg_match("/^[A-Za-z][A-Za-z .-]*$/", $name))
        {
            $nameErr = "Invalid format";
        }
        elseif (str_word_count($name) < 2)
        {
            $nameErr = "Must contain at least two words";
        }
    }

    /* 2. EMAIL VALIDATION */
    if (empty($_POST["email"]))
    {
        $emailErr = "Email is required";
    }
    else
    {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid email format";
        }
    }

    /* 3. DATE OF BIRTH VALIDATION */
    if (empty($_POST["dd"]) || empty($_POST["mm"]) || empty($_POST["yy"]))
    {
        $dobErr = "Date of birth required";
    }
    else
    {
        $dd = $_POST["dd"];
        $mm = $_POST["mm"];
        $yy = $_POST["yy"];

        if ($dd < 1 || $dd > 31 || $mm < 1 || $mm > 12 || $yy < 1953 || $yy > 1998)
        {
            $dobErr = "Invalid date range";
        }
        else
        {
            $dob = "$dd-$mm-$yy";
        }
    }

    /* 4. GENDER VALIDATION */
    if (!isset($_POST["gender"]))
    {
        $genderErr = "Select at least one";
    }

    /* 5. DEGREE VALIDATION */
    if (!isset($_POST["degree"]) || count($_POST["degree"]) < 2)
    {
        $degreeErr = "Select at least two";
    }

    /* 6. BLOOD GROUP VALIDATION */
    if (!isset($_POST["blood"]))
    {
        $bloodErr = "Blood group must be selected";
    }
}
?>

<form method="post" action="">

<!-- 1. Name -->
Name:
<input type="text" name="name" value="<?php echo $name; ?>">
<?php echo $nameErr; ?>
<br><br>

<!-- 2. Email -->
Email:
<input type="text" name="email" value="<?php echo $email; ?>">
<?php echo $emailErr; ?>
<br><br>

<!-- 3. Date of Birth -->
Date of Birth:
<input type="number" name="dd" placeholder="DD" size="2">
<input type="number" name="mm" placeholder="MM" size="2">
<input type="number" name="yy" placeholder="YYYY" size="4">
<?php echo $dobErr; ?>
<br><br>

<!-- 4. Gender -->
Gender:
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female
<input type="radio" name="gender" value="Other">Other
<?php echo $genderErr; ?>
<br><br>

<!-- 5. Degree -->
Degree:
<input type="checkbox" name="degree[]" value="SSC">SSC
<input type="checkbox" name="degree[]" value="HSC">HSC
<input type="checkbox" name="degree[]" value="BSc">BSc
<input type="checkbox" name="degree[]" value="MSc">MSc
<?php echo $degreeErr; ?>
<br><br>

<!-- 6. Blood Group -->
Blood Group:
<select name="blood">
    <option value="">Select</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="O+">O+</option>
</select>
<?php echo $bloodErr; ?>
<br><br>

<input type="submit" value="Submit">

</form>

</body>
</html>
