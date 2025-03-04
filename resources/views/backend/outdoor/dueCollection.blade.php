<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Due Collection - Animated</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 {
            text-align: center;
        }
        .search-box {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            animation: slideUp 0.8s ease-in-out;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        .due {
            color: red;
            font-weight: bold;
        }
        .paid {
            color: green;
            font-weight: bold;
        }
        .pay-btn {
            background: #28a745;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        .pay-btn:hover {
            background: #218838;
        }
        .paid-animation {
            animation: scaleUp 0.5s ease-in-out;
        }
        @keyframes scaleUp {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Due Collection</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="dueTable">
                @foreach($testSale as $key => $val)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$val->name}}</td>
                    <td>{{$val->due}}</td>
                    <td class="due">Due</td>
                    <td><button class="pay-btn">Pay Now</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>
