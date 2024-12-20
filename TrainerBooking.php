<!DOCTYPE html>
<html>
    <body>
    <?php
    session_start();

    $servername = "localhost";
    $username = "root"; 
    $password = "";     
    $dbname = "gym";    

    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $fullName = $_POST['full_name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $fitnessGoal = $_POST['fitness_goal'];
        $exerciseFrequency = $_POST['exercise_frequency'];
        $activityLevel = $_POST['activity_level'];
        $workoutLocation = $_POST['workout_location'];
        $smoker = isset($_POST['smoker']) ? 1 : 0;
        $pregnant = isset($_POST['pregnant']) ? 1 : 0;
        $healthProblems = $_POST['health_problems'];
        $injuries = $_POST['injuries'];
        $trainer = $_POST['trainer'];

        $sql = "INSERT INTO trainer_booking (Username, `Full Name`, Gender, `Date of Birth`, `Email Address`, Weight, Height, `Fitness Goal`, `Exercise Frequency`, `Activity Level`, `Workout Location`, Smoker, Pregnant, `Health Problems`, Injuries, Trainer)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssiissssiisss", $username, $fullName, $gender, $dob, $email, $weight, $height, $fitnessGoal, $exerciseFrequency, $activityLevel, $workoutLocation, $smoker, $pregnant, $healthProblems, $injuries, $trainer);

        if ($stmt->execute()) {
            echo "<script>alert('Booking successful!');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    }

    $conn->close();
    ?>


        <div class="logo">
            <a href="index.html">
                <img src="utopialogo.png" alt="UTOPIA" style="width: 70px; height: 60px; margin-right: 90%;">
            </a>
        </div>
        <head>
        <title>TrainerBooking</title>
    
        </head>
        <h1> <img src="trainingatutopia.png"></h1>
        <p>Welcome to UTOPIA online community, your portable hub for sweat sessions and mindfulness practices. It’s always a good time to set new life goals & when it comes to your well being ones, Our platform is the place to help you achieve their outmost. It was never just a workout, it’s something to look forward to. Wherever you are, whenever you’re ready, whatever your goal is. We take care of everything. With the right personal trainer you can never reach a plateau. Sign up for our customized workouts to unlock the extraordinary & let the transformation begin.</p>
        <div class="shoppingcart" alt="Shopping Cart">
            <img src="shoppingcart.png" width="60" height="50">
        </div>

        <div class="shoppingcart" alt="Shopping Cart" onclick="toggleCart()">
            <img src="shoppingcart.png" width="60" height="50">
        </div>
        <section id="trainingvideo">
            <video   width="1100" height="800" autoplay muted loop>
            <source src="trainingvideo.mp4" type="video/mp4">
            </video>
        </section>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="photo-gallery">
            <div class="photo-item">
                <img src="https://onlinetraining.la7gym.com/wp-content/uploads/2023/01/AHMED-SHIRBINI.jpg" alt="Ahmed Sherbini">
                <h2>AHMED SHERBINI</h2>
                <p>Expert in functional training and HIIT workouts.</p>
            </div>
            <div class="photo-item">
                <img src="https://onlinetraining.la7gym.com/wp-content/uploads/2023/01/INJY-SWEID.jpg" alt="Injy Sweid">
                <h2>INGY SWEID</h2>
                <p>Certified yoga and mindfulness coach.</p>
            </div>
            <div class="photo-item">
                <img src="https://onlinetraining.la7gym.com/wp-content/uploads/2023/01/nadin.jpg" alt="Nadin">
                <h2>NADIN</h2>
                <p>Strength and conditioning specialist.</p>
            </div>
            <div class="photo-item">
                <img src="https://onlinetraining.la7gym.com/wp-content/uploads/2023/01/saad.jpg" alt="Saad">
                <h2>SAAD</h2>
                <p>Professional bodybuilder and nutritionist.</p>
            </div>
            <div class="photo-item">
                <img src="https://onlinetraining.la7gym.com/wp-content/uploads/2023/01/mostafa-abd-el-aziz.jpg" alt="Mostafa Abd El Aziz">
                <h2>MOSTAFA ABD EL AZIZ</h2>
                <p>Personal fitness and weight loss expert.</p>
            </div>
            <div class="photo-item">
                <img src="https://onlinetraining.la7gym.com/wp-content/uploads/2023/01/hania.jpg" alt="Hania">
                <h2>HANIA</h2>
                <p>Pilates instructor and flexibility coach.</p>
            </div>
            <div class="photo-item">
                <img src="https://onlinetraining.la7gym.com/wp-content/uploads/2023/01/OMAR-KORAYEM.jpg" alt="Omar Korayem">
                <h2>OMAR KORAYEM</h2>
                <p>Strength trainer with expertise in calisthenics.</p>
            </div>
            <div class="photo-item">
                <img src="https://onlinetraining.la7gym.com/wp-content/uploads/2020/03/REEM-ALY.jpg" alt="Reem Aly">
                <h2>REEM ALY</h2>
                <p>Certified fitness trainer and wellness coach.</p>
            </div>
            <div class="photo-item">
                <img src="https://onlinetraining.la7gym.com/wp-content/uploads/2020/03/MONIR-KANOSH.jpg" alt="Monir Kanosh">
                <h2>MONIR KANOSH</h2>
                <p>Specialist in strength training and recovery.</p>
            </div>
        </div>

        <br><br><br><br><br><br>
        <h1><img src="booknow.png" height=60px width=250px> </h1>

        <form style="width: 50%; margin: auto; background-color: #1a1a1a; color: white; padding: 20px; border-radius: 10px;" onsubmit="addToCart(event)">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label for="fullname">Full Name<span style="color: red;">*</span></label><br>
                    <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required style="width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px;">
                </div>
                <div>
                    <label for="gender">Gender<span style="color: red;">*</span></label><br>
                    <select id="gender" name="gender" required style="width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px;">
                        <option value="">Select</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </div>
                <div>
                    <label for="dob">Date of Birth<span style="color: red;">*</span></label><br>
                    <input type="date" id="dob" name="dob" required style="width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px;">
                </div>
                <div>
                    <label for="email">Email Address<span style="color: red;">*</span></label><br>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required style="width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px;">
                </div>
                <div>
                    <label for="Username">Username<span style="color: red;">*</span></label><br>
                    <input type="tel" id="username" name="username" placeholder="Enter your username" required style="width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px;">
                </div>
                <div>
                    <label for="weight">Weight</label><br>
                    <input type="number" id="weight" name="weight" placeholder="Weight (kg)" style="width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px;">
                </div>
                <div>
                    <label for="height">Height</label><br>
                    <input type="number" id="height" name="height" placeholder="Height (cm)" style="width: 100%; padding: 10px; background-color: #333; color: white; border: none; border-radius: 5px;">
                </div>
            </div>
            <br>

            <h3 style="color: white; margin-top: 20px;">Your Fitness Goal</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px;">
                <label style="color: grey;">
                    <input type="radio" name="goals" value="Weight loss"> Weight loss
                </label>
                <label style="color: grey;">
                    <input type="radio" name="goals" value="Fat loss"> Fat loss
                </label>
                <label style="color: grey;">
                    <input type="radio" name="goals" value="Endurance"> Endurance
                </label>
                <label style="color: grey;">
                    <input type="radio" name="goals" value="Flexibility"> Flexibility
                </label>
                <label style="color: grey;">
                    <input type="radio" name="goals" value="Muscular strength"> Muscular strength
                </label>
                <label style="color: grey;">
                    <input type="radio" name="goals" value="Appearance"> Appearance
                </label>
                <label style="color: grey;">
                    <input type="radio" name="goals" value="Fitness"> Fitness
                </label>
                <label style="color: grey;">
                    <input type="radio" name="goals" value="General conditioning"> General conditioning
                </label>
                <label style="color: grey;">
                    <input type="radio" name="goals" value="Toning & shaping"> Toning & shaping
                </label>
                <label style="color: grey;">
                    <input type="radio" name="goals" value="Posture"> Posture
                </label>
                <label style="color: grey;">
                    <input type="radio" name="goals" value="Other"> Other
                </label>
            </div>
            <br>
            
        

    
    <h3 style="color: white; margin-top: 20px;">Do You Exercise Regularly?</h3>
    <div style="color: grey;">
        <label><input type="radio" name="exercise" value="Never"> I have never exercised regularly</label><br>
        <label><input type="radio" name="exercise" value="Used to"> I used to exercise regularly</label><br>
        <label><input type="radio" name="exercise" value="Occasionally"> I exercise every now and then</label><br>
        <label><input type="radio" name="exercise" value="Regularly"> I currently exercise regularly</label>
    </div>

    <h3 style="color: white; margin-top: 20px;">Rate Your Overall Activity Level</h3>
    <div style="color: grey;">
        <label><input type="radio" name="activity" value="Inactive"> Inactive</label><br>
        <label><input type="radio" name="activity" value="Moderately Active"> Moderately Active</label><br>
        <label><input type="radio" name="activity" value="Active"> Active</label><br>
        <label><input type="radio" name="activity" value="Very Active"> Very Active</label>
    </div>

    <h3 style="color: white; margin-top: 20px;">Where Do You Usually Workout?</h3>
    <div style="color: grey;">
        <label><input type="radio" name="workout" value="Gym"> Gym</label><br>
        <label><input type="radio" name="workout" value="Home"> Home</label>
    </div>

    <h3 style="color: white; margin-top: 20px;">Are You a Smoker?</h3>
    <div style="color: grey;">
        <label><input type="radio" name="smoker" value="Yes"> Yes</label><br>
        <label><input type="radio" name="smoker" value="No"> No</label>
    </div>

    <h3 style="color: white; margin-top: 20px;">Are You Pregnant?</h3>
    <div style="color: grey;">
        <label><input type="radio" name="pregnant" value="Yes"> Yes</label><br>
        <label><input type="radio" name="pregnant" value="No"> No</label>
    </div>
    <br>

    <h3 style="color: white; margin-top: 20px;">Do You Have Any Diagnosed Health Problems?</h3>
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px;">
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="Asthma"> Asthma
    </label>
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="Arthritis"> Arthritis
    </label>
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="Heart disease"> Heart disease
    </label>
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="Lung disease"> Lung disease
    </label>
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="High blood pressure"> High blood pressure
    </label>
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="Low blood pressure"> Low blood pressure
    </label>
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="Shortness of breath"> Shortness of breath
    </label>
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="Blood cholesterol"> Blood cholesterol
    </label>
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="Thyroid condition"> Thyroid condition
    </label>
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="Diabetic"> Diabetic
    </label>
    <label style="color: grey;">
        <input type="radio" name="health_problems" value="Other"> Other
    </label>
</div>
<br>

<h3 style="color: white; margin-top: 20px;">Please List Any Current or Past Injuries That Could Prevent Certain Activities:</h3>
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 10px;">
    <label style="color: grey;">
        <input type="radio" name="injuries" value="Back problems"> Back problems
    </label>
    <label style="color: grey;">
        <input type="radio" name="injuries" value="Muscle disorder"> Muscle disorder
    </label>
    <label style="color: grey;">
        <input type="radio" name="injuries" value="Joint dislocation"> Joint dislocation
    </label>
    <label style="color: grey;">
        <input type="radio" name="injuries" value="Tendon/ligament Tear"> Tendon/ligament Tear
    </label>
    <label style="color: grey;">
        <input type="radio" name="injuries" value="Recent surgery"> Recent surgery (last 12 months)
    </label>
    <label style="color: grey;">
        <input type="radio" name="injuries" value="Other"> Other
    </label>
</div>
<br>

<h3 style="color: white; margin-top: 20px;">Choose Your Trainer</h3>
<select name="trainer" style="width: 100%; padding: 10px; margin-top: 10px; border: 1px solid grey; border-radius: 5px; background-color: #222; color: grey; font-size: 16px;">
    <option value="" disabled selected style="color: grey;">Select a trainer</option>
    <option value="Ahmed Sherbini">Ahmed Sherbini - 3,400 EGP per month</option>
    <option value="Injy Sweid">Injy Sweid - 3,600 EGP per month</option>
    <option value="Nadin">Nadin - 3,200 EGP per month</option>
    <option value="Saad">Saad - 3,800 EGP per month</option>
    <option value="Mostafa Abd El Aziz">Mostafa Abd El Aziz - 3,700 EGP per month</option>
    <option value="Hania">Hania - 3,300 EGP per month</option>
    <option value="Omar Korayem">Omar Korayem - 4,000 EGP per month</option>
    <option value="Reem Aly">Reem Aly - 3,500 EGP per month</option>
    <option value="Monir Kanosh">Monir Kanosh - 3,900 EGP per month</option>
</select>

<br><br><br>

<button type="submit" style="width: 100%; padding: 10px; background-color: #6b6b6b; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
    Submit
</button>
</form>

<div id="cartContainer" style="display:none; position: fixed; top: 100px; right: 20px; background-color: #333; padding: 20px; color: white; border-radius: 10px; max-width: 300px;">
    <h2>Your Cart</h2>
    <div id="cart" style="display: flex; justify-content: center; align-items: left; padding-right:270px;">
        <p>Your cart is empty</p>
    </div>
</div>

        <br><br><br><br>




        <footer>
            
     <div class="social-icons">
         <a href="https://www.instagram.com/la7gym/?hl=en" target="_blank">
             <img src="https://www.aloyoga.com/cdn/shop/files/instagram2021.svg?v=15745790383220268811" alt="Instagram" />
         </a>
         <a href="https://www.facebook.com/la7gym/?locale=ar_AR" target="_blank">
             <img src="https://www.aloyoga.com/cdn/shop/files/facebook2021.svg?v=4098279864862808269" alt="Facebook" />
         </a>
         <a href="https://www.youtube.com/channel/UCZ4NEgJB0svYpss5RTus59A" target="_blank">
             <img src="https://www.aloyoga.com/cdn/shop/files/youtube2021.svg?v=13243599999976738993" alt="YouTube" />
         </a>
     </div>
         <p class="rights">&copy; 2024 UTOPIA Gym. All rights reserved.</p>
             <p class="contactus">
                 Contact us:<br>
 
                 New Giza | +20 111 811 9701<br>
                 Uptown   |+20 115 038 8119<br>
                 Arkan    |  +20 115 449 9747<br>
                 <br>
                 
                 Email : info@Utopiagym.com
             </p>
             <p class="contactus2">
                 We are dedicated to the pursuit of peak performance. Whether you are looking for a fun workout, achieving some set goals or just maintaining a healthy lifestyle, we’re in it together. You will never feel lost, confused or bored. 
             <br>
             <br>
                 “Your Wellbeing is what we do” 
             </p>
 
     </footer>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: black;
                color: white;
            }
            h1{
                margin-left:250px;
                margin-top:50px;
            }
            p{
                color:grey ;
                padding-left:240px;
                padding-right:200px;
            }
            .shoppingcart{
                margin-left: 1200px;
                position: fixed;
                top: 50px;
                z-index: 1000;
                transition: transform 0.3s ease; 
            }

            .shoppingcart:hover {
                transform: scale(1.2);
            }
            #trainingvideo{
                display: flex;
                justify-content: center;
                position: absolute;
                top: 10px;
                width: 100%;
            }
            .photo-gallery {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                justify-items: center;
                
            }
            .photo-item {
                text-align: center;
            }
            .photo-item img {
                width: 100%;
                max-width: 350px; /* Increases image size */
                height: auto;
                filter: grayscale(100%);
                transition: filter 0.5s ease, transform 0.5s ease;
            }
            .photo-item img:hover {
                filter: grayscale(0%);
                transform: scale(1.1);
            }
            .photo-item h2 {
                font-size: 20px;
                margin: 10px 0 5px;
                color: white;
            }
            .photo-item p {
                font-size: 14px;
                color: grey;
                padding-left:15px;
                padding-right:15px;
            }
            footer {
                background-color: rgb(52, 49, 49);
                padding: 30px 0;
                text-align: center;
                margin-top: auto;
            }
            
            </style>

            <script>
                let cart = []; 
            
                
                function addToCart(event) {
                    event.preventDefault(); 
            
                    const trainerSelect = document.querySelector('select[name="trainer"]');
                    const selectedTrainer = trainerSelect.options[trainerSelect.selectedIndex];
                    const trainerName = selectedTrainer.value;
                    const trainerPrice = selectedTrainer.text;
            
                    cart.push({ name: trainerName, price: trainerPrice });
            
                    
                    updateCart();
                }
            
                function updateCart() {
                    const cartIcon = document.getElementById('cart');
                    cartIcon.innerHTML = ""; // 
            
                    if (cart.length === 0) {
                        cartIcon.innerHTML = "<p>Your cart is empty</p>";
                    } else {
                        cart.forEach(item => {
                            const div = document.createElement('div');
                            div.innerHTML = `<p>${item.name} - ${item.price}</p>`;
                            cartIcon.appendChild(div);
                        });
                    }
                }
            
                
                function toggleCart() {
                    const cartContainer = document.getElementById('cartContainer');
                    cartContainer.style.display = cartContainer.style.display === "none" ? "block" : "none";
                }
            </script>

    </body>
</html>
