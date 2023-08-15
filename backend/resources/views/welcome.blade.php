<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="multiStepForm" action="{{ url('users') }}" method="post"> @csrf
                    <input type="hidden" name="user_id" value="{{ @$sessionUser ? $sessionUser->id : ""}}" readonly>
                    <div class="step" id="step1">
                        <h3>Step 1: Username and Password</h3>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{ @$sessionUser ? $sessionUser->name : ""}}">

                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required value="{{ @$sessionUser ? $sessionUser->email : ""}}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="button" class="btn btn-primary next-step" data-step="2">Next</button>
                    </div>
                    <div class="step" id="step2" style="display: none;">
                        <h3>Step 2: Address and Mobile Number</h3>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ @$sessionUserAddress ? $sessionUserAddress->address : ""}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required value="{{ @$sessionUserAddress ? $sessionUserAddress->mobile : ""}}">
                        </div>
                        <button type="button" class="btn btn-secondary prev-step" data-step="1">Previous</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
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
        });
    </script>
</body>

</html>
