<?php 
include ('header.php');
?>
        <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
            Add Tenant
            </h2>
            <form id = "tenantForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <?php
            include('../helperfuncs/tntDataIns.php')
            ?>
            <div
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <label class="block text-sm">
                <?php   
                $valueName = $_SESSION['username'];
                ?>
              <input type="hidden" id= "custF" name="custF" value="<?php echo $valueName; ?>">
                <span class="text-gray-700 dark:text-gray-400">First Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Jane "
                  id= "firstName"
                  name="firstName"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Last Name</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Doe"
                  id="lastName"
                  name="lastName"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Username</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Username"
                  id="Username"
                  name="Username"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="janedoe@example.com"
                  id="email"
                  name="email"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input
                  type= "password"
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder=""
                  id="Pass"
                  name="Pass"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Tenant Type
                </span>
                <select
                 id="tenType"
                 name="tenType"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                <option selected disabled> --Tenant Type -- </option>
                <option>Company</option>
                <option>Individual</option>
                 
                  
                </select>
              </label>
              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Gender
                </span>
                <select
                  name ="gender"
                  id = "gender"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                <option selected disabled> --Gender-- </option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>Others</option>
                </select>
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Next of Kin</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder=""
                  id= "nextKin"
                  name="nextKin"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Next of Kin Contact</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="(254)7 XX XXX XXX"
                  id= "nextKinContact"
                  name="nextKinContact"
                />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Nationality
                </span>
                <select
                  id="nationality"
                  name="nationality"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                  <option>Kenya</option>
                  <option>Uganda</option>
                  <option>Tanzania</option>
                </select>
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">ID Number</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="01235678"
                  id= "idNo"
                  name="idNo"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tenant Mobile No</span>
                <input
                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="(254)7 XX XXX XXX"
                  id= "telNo"
                  name="telNo"
                />
              </label>


              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Apartment Name
                </span>
                <select
                  id="ApartmtName"
                  name="ApartmtName"
                  class="block w-full mt-1 text-sm dark:text-gray-800 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                <option selected disabled>Fetching Available Apartments....</option>
                  
                </select>
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Unit No
                </span>
                <select
                 id="UnitNo"
                 name="UnitNo"
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                >
                <option selected disabled>Fetching Available Units....</option>
                 
                  
                </select>
              </label>
              <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Assume the username is stored in a JavaScript variable (it could be passed from server-side)
                        const username = "<?php echo $_SESSION['username']; ?>";

                        // Fetch and populate apartments
                        $.ajax({
                            url: '../helperfuncs/getApartments.php',
                            method: 'POST',
                            data: { username: username },
                            success: function(data) {
                                data.forEach(function(apartment) {
                                    $('#ApartmtName').append(new Option(apartment.prptyName, apartment.prptyName));
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error('Error fetching apartments:', error);
                            }
                        });

                        // Handle apartment selection change
                        $('#ApartmtName').on('change', function() {
                            const prptyName = $(this).val();
                            $('#UnitNo').empty().append(new Option('Select Available  Units', ''));

                            if (prptyName) {
                                $.ajax({
                                    url: '../helperfuncs/getUnitData.php',
                                    method: 'POST',
                                    data: {
                                        apartment_id: prptyName,
                                        username: username
                                    },
                                    success: function(data) {
                                        data.forEach(function(unit) {
                                            $('#UnitNo').append(new Option(unit.hseNo));
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error fetching units:', error);
                                    }
                                });
                            }
                        });
                    });
                </script>
              <br>
              <body>
                <button class="purple-button">Submit</button>
            </body>
            </div>
            </form>
            </div>
        </main>
      </div>
    </div>
  </body>
  <style>
        .purple-button {
        background-color: #6a0dad; /* Purple background color */
        color: #ffffff; /* White text color */
        border: none; /* Remove default border */
        border-radius: 5px; /* Rounded corners */
        padding: 10px 20px; /* Padding inside the button */
        font-size: 12px; /* Font size */
        cursor: pointer; /* Pointer cursor on hover */
        transition: background-color 0.3s ease; /* Smooth transition for background color */
    }

    .purple-button:hover {
        background-color: #5a0da0; /* Darker purple on hover */
    }

    .purple-button:active {
        background-color: #4a0d90; /* Even darker purple when clicked */
    }

  </style>
</html>