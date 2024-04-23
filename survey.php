<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <div class="side-nav">
            <div class="user">
                <img src="Images/user.png" class="user-img">
                <div>
                    <h2>Ardaciti</h2>
                    <p>ardacitim@xyz.com</p>
                </div>
                <img src="Images/star.png" class="star-img">
            </div>
            <ul>
                <li><img src="Images/dashboard.png" alt="">
                    <p>Dashboard</p>
                </li>
                <li><img src="Images/members.png" alt="">
                    <p>Patients</p>
                </li>
                <li><img src="Images/reports.png" alt="">
                    <p>Reports</p>
                </li>
                <li><img src="Images/setting.png" alt="">
                    <p>Settings</p>
                </li>
            </ul>
            <ul>
                <li><img src="Images/logout.png" alt="">
                    <p>Logout</p>
                </li>
            </ul>
        </div>
        <form action="/submit_survey" method="post" id="survey_form">
        <h2>Medical Survey</h2>
        <table class="survey_table">
            <tr>
                <td>
                    <label for="chronic-diseases">Do you have any chronic diseases?</label>
                    </br>
                    <select name="illness" id="chronic-diseases" onchange="showChronicDiseaseOptions()">
                        <option selected hidden value="">--Select--</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td> 
            </tr>
            <tr id="chronic-disease-options" style="display: none;">
            <td>
                <label for="chronic-disease-list">Select chronic diseases:</label>
                </br>
                <select name="chronic_disease_list" id="chronic-disease-list">
                    <option selected hidden value="">--Select--</option>
                    <option value="cancer">Cancer</option>
                    <option value="asthma">Asthma</option>
                    <option value="high_blood_pressure">High Blood Pressure</option>
                    <option value="arthritis">Arthritis</option>
                    <option value="other">Other</option>
                </select>
                </br>
                <input type="text" name="other-chronic-disease" id="other-chronic-disease" placeholder="Enter other chronic disease" style="display: none;">
            </td>
        </tr>
            <tr>
                <td>
                    <label for="hospital-visits">How often do you go to the hospital?</label>
                    </br>
                    <select name="hospital_visits" id="hospital-visits">
                        <option selected hidden value="">--Select--</option>
                        <option value="once_months" id="">Once a month</option>
                        <option value="once_2_months" id="">Once every 2 months</option>
                        <option value="once_4_months" id="">Once every 4 months</option>
                        <option value="every_6_months" id="">Every 6 months</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="hospital_check-ups">How often do you have doctor check-ups?</label>
                    </br>
                    <select name="hospital_checkUps" id="hospital_check-ups">
                        <option selected hidden value="">--Select--</option>
                        <option value="">Once a month</option>
                        <option value="">Once every 2 months</option>
                        <option value="">Once every 4 months</option>
                        <option value="">Every 6 months</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="check-ups">What causes you not to go for your checkup?</label>
                    </br>
                    <select name="causes" id="check-ups">
                        <option selected hidden value="">--Select--</option>
                        <option value="transportation">Transportation</option>
                        <option value="financial_constraints">Financial constraints</option>
                        <option value="denial_diagnosis">Denial of diagnosis</option>
                        <option value="other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="check-ups">How often do you have doctor check-ups?</label>
                    </br>
                    <select name="check_ups" id="check-ups">
                        <option selected hidden value="">--Select--</option>
                        <option value="">Once a month</option>
                        <option value="">Once every 2 months</option>
                        <option value="">Once every 4 months</option>
                        <option value="">Every 6 months</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="medicines">How often do you have trouble taking medicines the way you have been told to take them?</label>
                    </br>
                    <select name="treatment" id="medicines">
                        <option selected hidden value="">--Select--</option>
                        <option value="never">Never</option>
                        <option value="rarely">Rarely</option>
                        <option value="sometimes">Sometimes</option>
                        <option value="often">Often</option>
                        <option value="always">Always</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="obtain_medication">Do you find it difficult to obtain your medication from the clinic or pharmacy?</label>
                    </br>
                    <select name="obtain_medication" id="medicines">
                        <option selected hidden value="">--Select--</option>
                        <option value="never">Never</option>
                        <option value="rarely">Rarely</option>
                        <option value="sometimes">Sometimes</option>
                        <option value="often">Often</option>
                        <option value="always">Always</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="medication">Are you getting the correct medication for your condition?</label>
                    </br>
                    <select name="medication" id="medication">
                        <option selected hidden value="">--Select--</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                        <option value="not_sure">I'm not sure</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="medication">Do you have easy access to healthcare facilities?</label>
                    </br>
                    <select name="facilities" id="medication">
                        <option selected hidden value="">--Select--</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="long_waiting">Have you experienced long waiting times at the clinic or pharmacy?</label>
                    </br>
                    <select name="queues" id="long_waiting">
                        <option selected hidden value="">--Select--</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="defaulted_medication">Have you ever defaulted from taking your medication?</label>
                    </br>
                    <select name="defaulted_medication" id="defaulted_medication" onchange="showNextQuestion()">
                        <option selected hidden value="">--Select--</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </td>
            </tr>
            <tr id="next_question" style="display: none;">
                <td>
                    <label for="defaulted_reason">What is the reason?</label>
                    </br>
                    <select name="defaulted_reason" id="defaulted_reason">
                        <option selected hidden value="">--Select--</option>
                        <option value="Forgetfulness">Forgetfulness</option>
                        <option value="side_effects">Side effects</option>
                        <option value="cost">Cost</option>
                        <option value="awareness">lack of awareness</option>
                        <option value="stigma">Stigma</option>
                        <option value="other">Other</option>
                    </select>
                </td>
            </tr>
            </tr>
            
            <tr>
                <td><button type="submit" value="Submit" name="save" class="survey_btn">Submit</button></td>
</tr>
        </table>
    </form>
</div>
    <script>
        function showChronicDiseaseOptions() {
        var selectBox = document.getElementById("chronic-diseases");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var chronicDiseaseOptions = document.getElementById("chronic-disease-options");
        var chronicDiseaseList = document.getElementById("chronic-disease-list");
        var otherChronicDiseaseInput = document.getElementById("other-chronic-disease");

        if (selectedValue === "yes") {
            chronicDiseaseOptions.style.display = "table-row";
            chronicDiseaseList.style.display = "inline";
            otherChronicDiseaseInput.style.display = "none";
        } else {
            chronicDiseaseOptions.style.display = "none";
        }
    }

        document.getElementById("chronic-disease-list").addEventListener("change", function() {
            var selectBox = document.getElementById("chronic-disease-list");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            var otherChronicDiseaseInput = document.getElementById("other-chronic-disease");

            if (selectedValue === "other") {
                otherChronicDiseaseInput.style.display = "inline";
            } else {
                otherChronicDiseaseInput.style.display = "none";
            }
        });
        function showNextQuestion() {
            var selectBox = document.getElementById("defaulted_medication");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            var nextQuestionDiv = document.getElementById("next_question");

            if (selectedValue === "yes") {
                nextQuestionDiv.style.display = "table-row";
            } else {
                nextQuestionDiv.style.display = "none";
            }
        }
    </script>
</body>
</html>
<?php



require_once'connection.php';



$illness = $hospital_visits = $hospital_checkups= $causes = $check_ups= $treatment = $obtain_medication= $medication=$facilities= $queues= $defaulted_medication=$defaulted_reasons=" ";



if(isset($_POST['illness']))

{

    $illness = $_POST['illness'];

	$hospital_visits= $_POST['hospital_visits'];

	$hospital_checkups= $_POST['hospital_checkups'];

	$causes= $_POST['causes'];
    $check_ups= $_POST['check_ups'];   
    $treatment = $_POST['treatment'];

	$obtain_medication= $_POST['obtain_medication'];

	$medication= $_POST['medication'];

	$facilities= $_POST['facilities'];
    $queues= $_POST['queues'];

	$defaulted_medication= $_POST['defaulted_medication'];

	$defaulted_reasons= $_POST['defaulted_reasons'];
   



}



if(isset($_POST['save']))

{



$query = "INSERT INTO survey(illness,hospital_visits,hospital_checkups,causes,check_ups,treatment,obtain_medication,medication,facilities,queuesdefaulted_medication,defaulted_reasons)VALUES('$illness','$hospital_visits',' $hospital_checkups','$causes','$check_ups',' $treatment',' $obtain_medication','$medication','$facilities'' $queues','$defaulted_medication','$defaulted_reasons')";



$result = $con->query($query);



if(!$result)

{die($con->error);
    echo"alert('There was an issue uploading your details,please try again or contact an administrator')";

}

else

{



echo"alert('Information successfully submitted!')";

}

}

