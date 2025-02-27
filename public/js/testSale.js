function sumNumbers() {

    let number1 = parseInt(document.getElementById('num1').value, 10);
    let number2 = parseInt(document.getElementById('num2').value, 10);
    let number3 = parseInt(document.getElementById('num3').value, 10);
    let btnSave = document.getElementById('btnSave');

    let range = 10000000;


    if(number2 < 0 || number2 === "")
    {
        document.getElementById("result").innerHTML = "Error 401.";
        return false;
    }

    if(number3.valueOf < 0 || number3.valueOf === "")
    {
        alert("Discount not possible.");
        return 0;
    }

    if(number2 < range)
    {
        if (!isNaN(number1) && !isNaN(number2)) {

            let sum = number1 - number2 - number3;

            if(number2 > number1)
            {
                document.getElementById('result').textContent = "Return: " + sum + "/-";
                btnSave.disabled = false;
            }
            else if (number3 == number1)
            {
                document.getElementById('result').textContent = "Full Discount! : " + sum  + "/-";
                btnSave.disabled = false;
            }
            else if (number2 < number1)
            {
                if(number2 == 0)
                {
                    document.getElementById('result').textContent = "Full Due! : " + sum  + "/-";
                    btnSave.disabled = false;
                }
                else
                {
                    if(sum < 0 )
                    {
                        document.getElementById('result').textContent = "Return: " + sum  + "/-";
                        btnSave.disabled = false;
                    }
                    else if (sum == 0)
                    {
                        document.getElementById('result').textContent = "Full Paid: " + sum  + "/-";
                        btnSave.disabled = false;
                    }
                    else
                    {
                        document.getElementById('result').textContent = "Due: " + sum  + "/-";
                        btnSave.disabled = false;
                    }
                }                
            }
            else
            {
                document.getElementById('result').textContent = "Full Paid: " + sum + "/-";
                btnSave.disabled = false;
            }
        } 
        else 
        {
            document.getElementById('result').textContent = "Please enter valid numbers";
            btnSave.disabled = true;
        }
    }
    else if (number2 >= range)
    {
        var output1 = "Error ! Amount out of range. Please make sure your amount. Thank you!";
        document.getElementById('result').textContent = output1;
        btnSave.disabled = true;
    }
    
}

// const currentDate = new Date();

// const day = String(currentDate.getDate()).padStart(2, '0');
// const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed
// const year = currentDate.getFullYear();
// const formattedDate = `${year}-${month}-${day}`;
// document.getElementById('cdob').value = formattedDate;