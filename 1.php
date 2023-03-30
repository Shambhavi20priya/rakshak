<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-19</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="covid.css">
</head>
<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <div class="covid">
        <h1>KNOW MORE ABOUT COVID-19!!</h1>
        <img src="https://healthmatters.nyp.org/wp-content/uploads/2020/03/Article-hero.jpg" alt="covid" width="100%" height="100%">
        <div id="cooo">
            <div class="covid-info">
                <p align="justify"  class="info-1">Coronavirus disease (<b> COVID-19 </b>) is an infectious disease caused by the SARS-CoV-2 virus.</p><br>
                <p align="justify" class="info-2">Most people infected with the virus will experience mild to moderate respiratory illness and recover without requiring special treatment. However, some will become seriously ill and require medical attention. Older people and those with underlying medical conditions like cardiovascular disease, diabetes, chronic respiratory disease, or cancer are more likely to develop serious illness. Anyone can get sick with COVID-19 and become seriously ill or die at any age. </p><br>
                <p align="justify" class="info-4"><b> The virus can spread from an infected person’s mouth or nose in small liquid particles when they cough, sneeze, speak, sing or breathe. These particles range from larger respiratory droplets to smaller aerosols. It is important to practice respiratory etiquette, for example by coughing into a flexed elbow, and to stay home and self-isolate until you recover if you feel unwell.</b></p><br>
            </div>

        </div>
        <div class="covid-symptoms">
            <h2>KNOW YOUR SYMPTOMS AND CURE THEM FAST!!</h2>
            <div id="covid_symptns1">
                <p align="justify"class="symptoms"> <b> COVID-19 </b>affects different people in different ways. Most infected people will develop mild to moderate illness and recover without hospitalization.</p>
                <p align="justify" class="list_1"><b>Most common symptoms:</b></p>
                <ul class="symptons_li">
                    <li>fever</li>
                    <li>cough</li>
                    <li>tiredness</li>
                    <li>loss of taste or smell.</li>
                </ul>
                <p align="justify" class="list_2"><b>Serious symptoms:</b></p>
                <ul class="symptons_li">
                    <li>difficulty breathing or shortness of breath</li>
                    <li>loss of speech or mobility, or confusion</li>
                    <li>chest pain.</li>
                </ul>
                <p align="justify" class="list-info"><b>Seek immediate medical attention if you have serious symptoms.  Always call before visiting your doctor or health facility.</b> </p>            

            </div>
            <div class="prevention">
                <h2>PREVENT IT BEFORE CAUSING!!</h2>
                <div class="prevention_1">
                    <p align="justify" class="info_p1"><b>To prevent infection and to slow transmission of COVID-19, do the following: </b></p>
                    <ul class="symptons_li">
                        <li>Get vaccinated when a vaccine is available to you.</li>
                        <li>Stay at least 1 metre apart from others, even if they don't appear to be sick.</li>
                        <li>Wear a properly fitted mask when physical distancing is not possible or when in poorly ventilated settings.</li>
                        <li>Cover your mouth and nose when coughing or sneezing.</li>
                        <li>If you feel unwell, stay home and self-isolate until you recover.</li>
                    </ul>
                </div>
            </div>
            <marquee behavior="" direction=""><b>For more information contact the authorized doctor</b></marquee>

        </div>
    </div>
    <?php include 'partials/_footer.php'; ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>