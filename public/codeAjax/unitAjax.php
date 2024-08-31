<?php

include '../l_admin/server.php';

$valueName = $_SESSION['username'];

$commentNewCount = $_POST['commentNewCount'];

$sql = "SELECT * FROM hseTenantData WHERE u_landlord=? LIMIT $commentNewCount";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $valueName);
$stmt->execute();
$hseResults =  $stmt->get_result();

$hseData = $hseResults->fetch_all(MYSQLI_ASSOC);

 if($hseData): ?>
    <?php foreach($hseData as $row): ?>
        <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                    <!-- Avatar with inset shadow -->
                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                        <p class="font-semibold"><?= $row['tenName'] ?></p>
                        <p class="text-xs text-gray-600 dark:text-gray-400"></p>
                    </div>
                </div>
            </td>
            <td class="px-4 py-3 text-sm">
                <?= $row['unitSize'] ?>
            </td>
            <td class="px-4 py-3 text-xs">
                <?php if($row['occupStatus'] == true): ?>
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">Occupied</span>
                <?php elseif($row['occupStatus'] == false): ?>
                    <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">Vacant</span>
                <?php else: ?>
                    <span class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">To Vacate</span>
                <?php endif; ?>
            </td>
            <td class="px-4 py-3 text-sm">
                <?= $row['unitNo'] ?>
            </td>
            <td class="px-4 py-3 text-sm">
                Ksh <?= $row['balance'] ?>
            </td>
            <td class="px-4 py-3 text-sm">
                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                </button>
            </td>
            <td class="px-4 py-3">
                <div class="flex items-center space-x-4 text-sm">
                    <div>
                        <form action="tenant_profile.html">
                            <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Tenant Details</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6" class="text-center">No Tenant Data</td>
    </tr>
<?php endif; ?>
