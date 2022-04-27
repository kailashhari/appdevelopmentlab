<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Library</title>
</head>

<body>
    <h1>Library Catalouge</h1>
    <button id="get-books">Get catalouge</button>
    <table>
        <tr>
            <td>
                Book ID
            </td>
            <td>
                Title
            </td>
            <td>
                Author
            </td>
            <td>
                Availability
            </td>
        </tr>
        <tbody id="my-books-data">

        </tbody>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const getBooks = () => {$(document).ready(() => {
            $.ajax({
                type: "GET",
                url: "data.php",
                dataType: "html",
                success: (data) => {
                    $("#my-books-data").html(data);
                }
            })
        });}
        $("#get-books").click(getBooks);
    </script>
</body>

</html>