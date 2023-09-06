<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Code Snipets For Laravel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="//code.jquery.com/jquery-3.6.0.js"></script>
    <script src="//code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('data.create') }}">Json</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('data.view') }}">Json View</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ url('post/index') }}">Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('layout_content')
    </div>
    <script>
        $(".next-step").click(function() {
            var step = $(this).data("step");
            $("#step" + step).show();
            $(this).closest(".step").hide();
        });

        $(".prev-step").click(function() {
            var step = $(this).data("step");
            $("#step" + step).show();
            $(this).closest(".step").hide();
        });

    </script>
    <script>
        $("#sortable").sortable({
            update: function(event, ui) {
                updateIDs();
            }
        });

        function updateIDs() {
            $('.sortable-item').each(function(index) {
                var newID = 'item_' + (index + 1);
                this.id = newID;
                console.log(newID);
                $(this).text('Item ' + (index + 1));
            });
        }

    </script>
    <script>
        $(document).ready(function() {
            // Add Input Field
            $("#add-input").click(function() {
                var inputHtml = '<div class="mb-3">' +
                    '<input type="text" class="form-control mt-2" name="headline[]" placeholder="Input Field">' +
                    '<input type="text" class="form-control mt-2" name="description[]" placeholder="Input description">' +
                    '<button type="button" class="btn btn-danger remove-input mt-2">Remove</button>' +
                    '</div>';
                $("#dynamic-form").append(inputHtml);
            });
            // Remove Input Field
            $("#dynamic-form").on("click", ".remove-input", function() {
                $(this).parent(".mb-3").remove();
            });
        });

    </script>
    <script>
    $(document).ready(function() {
        $('#add-input-set').click(function() {
            const inputSet = `
                <div class="input-set">
                    <label for="headline">Headline:</label><br>
                    <input class="form-control" type="text" name="headline[]"><br>

                    <label for="description">Description:</label><br>
                    <textarea class="form-control" name="description[]"></textarea><br>
                </div>
            `;
            $('#json-input-form').append(inputSet);
        });

        $('#json-input-form').submit(function(event) {
            event.preventDefault();
            const inputSets = $('.input-set');
            const inputData = [];

            inputSets.each(function() {
                const headline = $(this).find('input[name="headline[]"]').val();
                const description = $(this).find('textarea[name="description[]"]').val();

                inputData.push({
                    headline: headline,
                    description: description
                });
            });

            $.ajax({
                type: 'POST',
                url: '/data/store',
                data: {
                    _token: '{{ csrf_token() }}',
                    headline: inputData.map(item => item.headline),
                    description: inputData.map(item => item.description)
                },
                success: function(response) {
                    console.log('Form submitted successfully!');
                    inputSets.find('input, textarea').val('');
                },
                error: function(error) {
                    console.log('An error occurred while submitting the form.');
                }
            });
        });
    });
</script>
</body>
</html>
