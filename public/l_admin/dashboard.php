<?php 
include __DIR__ . '/header.php';
include('../etc/date-time.php');
?>
        <script> src="https://code.jquery.com/jquery-3.6.0.min.js"</script>
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <br>
          <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg">
            <p class="text-lg font-bold"><?php echo is_time(). ","?></p>
    <p class="text-lg font-semibold">Welcome to your Dashboard!</p>
    <?php function great($name){
      echo $name;
    }
    echo "<p>".great($_SESSION['username'])."</p>";
  ?>
</div> 
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Dashboard
            </h2>
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total Occupancy
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  <?php
                  $sessionVar = $_SESSION['username'];
                  $occup = 'Occupied';
                  include('../helperfuncs/ClassOccup.php');
                  $ocp = new CountOccup($sessionVar, $occup);
                  $ocp->giveCount();
                  ?>
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total Accrued Rent
                  </p>
                    <?php
                    include('../helperfuncs/arrears.php');
                    $bal = new arrears($_SESSION['username']);
                    ?>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
                >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                </svg>
                
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Vacancies
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  <?php
                  $sessionVar = $_SESSION['username'];
                  $hstatus = 'Vacant';
                  include('../helperfuncs/ClassVcnt.php');
                  $ftch = new CountRows($sessionVar, $hstatus);
                  $ftch->giveCount();
                  ?>
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500"
                >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 0 1-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 0 0 6.16-12.12A14.98 14.98 0 0 0 9.631 8.41m5.96 5.96a14.926 14.926 0 0 1-5.841 2.58m-.119-8.54a6 6 0 0 0-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 0 0-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 0 1-2.448-2.448 14.9 14.9 0 0 1 .06-.312m-2.24 2.39a4.493 4.493 0 0 0-1.757 4.306 4.493 4.493 0 0 0 4.306-1.758M16.5 9a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                </svg>
                
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Vacated Tenants
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                  <?php
                  include('../helperfuncs/ClassVctdT.php');
                  $vct = new Vacated($sessionVar);
                  $vct->getResult();
                  ?>
                    
                  </p>
                </div>
              </div>
            </div>
            
            

            <!-- New Table -->
            <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
          >
            Rent Payment Statements
          </h2>
          <input
                  class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                  type="text"
                  placeholder="Search Table..."
                  aria-label="Search"
                  id="search"
                /> 
              <br>
            <div>
            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="fetchData(1)">Search</button> 
              <br>
            <div>
              <br>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <br>
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap" id="data-table">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">ID</th>
                      <th class="px-4 py-3">First Name</th>
                      <th class="px-4 py-3">Last Name</th>
                      <th class="px-4 py-3">Amount</th>
                      <th class="px-4 py-3">Transaction ID</th>
                      <th class="px-4 py-3">Apartment Name</th>
                      <th class="px-4 py-3">Unit No</th>
                      <th class="px-4 py-3">Balances</th>
                      <th class="px-4 py-3">Actions</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <tr class="text-gray-700 dark:text-gray-400">
                    
                  <!--Inputs -->
                  </tr>
                  </tbody>
                </table>
              </div>
              <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
              >
                <span class="flex items-center col-span-3">
                  
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                      <li>
                      <div id="pagination" class ="">
                            <!-- Pagination buttons will be populated here -->
                        </div>
                       
                      </li>
                      <style>
                        #pagination button {
                          margin: 2px;
                          padding: 5px 10px;
                      }
                      </style>
                    </ul>
                  </nav>
                </span>
              </div>
            </div>
<!--script -->
            <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        fetchData(1);
                    });

                    function fetchData(page) {
                        const search = document.getElementById('search').value;
                        const sessionUsername = '<?php echo $_SESSION["username"]; ?>';

                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', `../codeAjax/balances.php?page=${page}&search=${search}`, true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                        xhr.onload = function() {
                            if (this.status === 200) {
                                const response = JSON.parse(this.responseText);
                                const tableBody = document.getElementById('data-table').getElementsByTagName('tbody')[0];
                                tableBody.innerHTML = '';

                                if (response.data.length === 0) {
                                    const noResultsRow = document.createElement('tr');
                                    const noResultsCell = document.createElement('td');
                                    noResultsCell.setAttribute('colspan', '8');
                                    noResultsCell.classList.add('px-4', 'py-3', 'text-center');
                                    noResultsCell.textContent = 'No results found';
                                    noResultsRow.appendChild(noResultsCell);
                                    tableBody.appendChild(noResultsRow);
                                } else {
                                    response.data.forEach(row => {
                                        const tr = document.createElement('tr');
                                        tr.innerHTML = `
                                            <td class="px-4 py-3">${row.id}</td>
                                            <td class="px-4 py-3" style="color:#434243; font-weight:bold">${row.first_name}</td>
                                            <td class="px-4 py-3" style="color:blue; font-weight:bold">${row.last_name}</td>
                                            <td class="px-4 py-3" style="color:#04641F ; font-weight:bold">Ksh ${row.amount}</td>
                                            <td class="px-4 py-3" style="color:green; font-weight:bold">${row.transaction_id}</td>
                                            <td class="px-4 py-3" style="color:#484548; font-weight:bold" >${row.ApartmtName}</td>
                                            <td class="px-4 py-3" style="color:#057671; font-weight:bold">${row.hseNo}</td>
                                            <td class="px-4 py-3" style="color:#500576; font-weight:bold">Ksh ${row.balances}</td>
                                            <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">
                                            <form method='post' action="../unitDetails/unitact">
                                            <input type ="hidden" name="firstName" value="${row.first_name}">
                                            <input type ="hidden" name="lastName" value="${row.last_name}">
                                            <input type ="hidden" name="ApartmtName" value="${row.ApartmtName}">
                                            <input type ="hidden" name="HseN" value="${row.hseNo}">
                                            <input type = "hidden" name = "bal" value="${row.balances}">
                                            <button type="submit"  class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                Update Payments
                                              </button>
                                            </form>
                                            </div>
                                          </td>
                                          <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">
                                            <form method='post' action="tenantprofile.php">
                                            <input type="hidden" name="hseNo" value="${row.hseNo}">
                                            <input type ="hidden" name="aprtmtNo" value="${row.ApartmtName}">
                                            <button type="submit" name ="get_sess" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                Tenant Details
                                              </button>
                                            </form>
                                            </div>
                                          </td>
                                            
                                        `;
                                        tableBody.appendChild(tr);
                                    });
                                }

                                const pagination = document.getElementById('pagination');
                                pagination.innerHTML = '';

                                for (let i = 1; i <= response.pages; i++) {
                                    const button = document.createElement('button');
                                    button.innerText = i;
                                    button.onclick = () => fetchData(i);
                                    if (i === response.current) {
                                        button.style.fontWeight = 'bold'; // Highlight the current page button
                                    }
                                    pagination.appendChild(button);
                                }
                            }
                        };

                        xhr.send(`sessionUsername=${sessionUsername}`);
                    }


          
          </script>


            <!-- Charts -->
            <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
          >
            Detailed Financial Report
          </h2>
          <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md" style="margin-bottom: 20px;">
            <div class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
              <div class="w-max rounded-lg bg-gray-900 p-5 text-white">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  aria-hidden="true"
                  class="h-6 w-6"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3"
                  ></path>
                </svg>
              </div>
              <div>
                <h6 class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                  Monthly Revenue Collection
                </h6>
                <p class="block max-w-sm font-sans text-sm font-normal leading-normal text-gray-700 antialiased">
                  
                </p>
              </div>
            </div>
            <div class="pt-6 px-2 pb-0">
              <div id="bar-chart"></div>
            </div>
          </div>
           
          <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
          <script>
          const chartConfig = {
            // -- Initiate Graphs Data
            series: [
              {
                name: "Rent",
                data: [160000, 200000, 175000, 179000, 189000],
              },
            ],
            chart: {
              type: "bar",
              height: 240,
              toolbar: {
                show: false,
              },
            },
            title: {
              show: "",
            },
            dataLabels: {
              enabled: false,
            },
            colors: ["#020617"],
            plotOptions: {
              bar: {
                columnWidth: "40%",
                borderRadius: 2,
              },
            },
            xaxis: {
              axisTicks: {
                show: false,
              },
              axisBorder: {
                show: false,
              },
              labels: {
                style: {
                  colors: "#616161",
                  fontSize: "12px",
                  fontFamily: "inherit",
                  fontWeight: 400,
                },
              },
              categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
              ],
            },
            yaxis: {
              labels: {
                style: {
                  colors: "#616161",
                  fontSize: "12px",
                  fontFamily: "inherit",
                  fontWeight: 400,
                },
              },
            },
            grid: {
              show: true,
              borderColor: "#dddddd",
              strokeDashArray: 5,
              xaxis: {
                lines: {
                  show: true,
                },
              },
              padding: {
                top: 5,
                right: 20,
              },
            },
            fill: {
              opacity: 0.8,
            },
            tooltip: {
              theme: "dark",
            },
          };
           
          const chart = new ApexCharts(document.querySelector("#bar-chart"), chartConfig);
           
          chart.render();
          </script>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
