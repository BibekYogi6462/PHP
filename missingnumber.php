<!-- WAP to find a missing number in aarray (array contains number from (1 to n-1))

 $array1=[1,3,2]; - Missing 4 (Total number n + 1 = 3 + 1 = 4)
 $array2=[5,1,3,4]; - Missing 2 (Total number n + 1 = 4 + 1 = 5)
 $array3=[1,3,2,4,6]; - Missing 5 (Total number n + 1 = 5 + 1 = 6)

 -->
 <?php
function findMissingNumber($array) {
    // Calculate n based on the size of the array
    $n = count($array) + 1; // Since one number is missing
    
    // Calculate the expected sum from 1 to n
    $expectedSum = ($n * ($n + 1)) / 2;
    
    // Calculate the actual sum of the array
    $actualSum = array_sum($array);
    
    // The missing number is the difference
    $missingNumber = $expectedSum - $actualSum;
    
    return $missingNumber;
}

// Test cases
$array1 = [1, 3, 2];
$array2 = [5, 1, 3, 4];
$array3 = [1, 3, 2, 4, 6];

echo "Missing number in array1: " . findMissingNumber($array1) . PHP_EOL;
echo "Missing number in array2: " . findMissingNumber($array2) . PHP_EOL;
echo "Missing number in array3: " . findMissingNumber($array3) . PHP_EOL;
?>
