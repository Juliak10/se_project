<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Form</title>
    <style>
        :root {
            --primary-bg: #ffffff;
            --primary-text: #2c3e50;
            --hover-color: #3498db;
            --border-color: #e0e0e0;
            --input-bg: #f8f9fa;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --button-hover: #216ba5;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: var(--primary-text);
        }

        .wrapper {
            background: var(--primary-bg);
            box-shadow: 0 4px 6px var(--shadow-color);
            border-radius: 8px;
            padding: 30px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: var(--input-bg);
            resize: none;
            box-shadow: inset 0 1px 2px var(--shadow-color);
        }

        .btn {
            background: var(--hover-color);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: var(--button-hover);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Open Form</h1>
        <form action="submit_open_form.php" method="POST">
            <!-- Hidden fields -->
            <input type="hidden" name="form_title" value="Open Form">
            <input type="hidden" name="form_type" value="open_form">

            <label for="comments">Request Other Form</label>
            <textarea id="comments" name="form_content" placeholder="Enter any additional information here..." rows="10" required></textarea>
            <button type="submit" class="btn" id="submit-btn">Send</button>
        </form>
    </div>
</body>
</html>
