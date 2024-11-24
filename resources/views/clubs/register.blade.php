@extends('layouts.app')

@section('title', 'Optic Clubs - Home')

@section('content')
    @vite('resources/css/styles.css')

    <style>
        #bannerdi {
            background: linear-gradient(rgba(0,0,0,0.5), #128b9e94), url('{{ asset('images/home back.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            position: relative;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
    </style>

    <section id="bannerdi">
        <div class="navbar">
            <img src="{{ asset('images/logo.png') }}" alt="Optic Logo" class="logo">
        </div>
        <div class="hero">
            <h1>Register Clubs</h1>
        </div>
        <div class="hometextbtn">
            <a href="#ex"><span>Explore</span></a>
        </div>
    </section>

    <div id="ex"></div>

    <div class="form-container">
        <h2>Club Form</h2>
        <form method="POST" action="{{ route('clubs.store') }}" id="clubForm" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            
            <!-- Club Name -->
            <label for="clubName">Club Name:</label>
            <input type="text" id="clubName" name="clubName" required pattern=".{3,50}" title="Club name should be between 3 to 50 characters.">
        
            <!-- Club Description -->
            <label for="clubDescription">Club Description:</label>
            <textarea id="clubDescription" name="clubDescription" rows="4" required minlength="10" maxlength="500" title="Club description should be between 10 to 500 characters."></textarea>
        
            <!-- Club Size -->
            <label for="clubSize">Club Size:</label>
            <select id="clubSize" name="clubSize" required>
                <option value="small">Small (10-20 members)</option>
                <option value="medium">Medium (30-50 members)</option>
                <option value="large">Large (50+ members)</option>
            </select>
        
            <!-- Club Type -->
            <label>Club Type:</label>
            <div>
                <label for="physical">Physical</label>
                <input type="radio" id="physical" name="clubType" value="physical" required>
                <label for="nonPhysical">Non-Physical</label>
                <input type="radio" id="nonPhysical" name="clubType" value="non-physical" required>
            </div>
        
            <!-- Main Picture Upload -->
            <label for="main_image">Upload Main Picture:</label>
            <input type="file" id="main_image" name="main_image" accept="image/*" required onchange="previewImage(event)">
            <img id="mainPicturePreview" alt="Main Picture Preview" style="display:none; width:100px; height:auto; margin-top:10px;">
        
            <!-- Monthly Practice Timetable -->
            <label>Monthly Practice Timetable :</label>
            <table id="timetable-table">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="timetable[0][day]" placeholder="e.g., Monday" required pattern="^(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday)$" title="Enter a valid day (e.g., Monday)"></td>
                        <td><input type="text" name="timetable[0][time]" placeholder="e.g., 10:00 - 12:00" required pattern="^[0-9]{2}:[0-9]{2}\s*-\s*[0-9]{2}:[0-9]{2}$" title="Enter a valid time range (e.g., 10:00 - 12:00)"></td>
                        <td><button type="button" onclick="addRow()">Add Row</button></td>
                    </tr>
                </tbody>
            </table>
        
            <!-- PayPal Button -->
            <div class="paypal-payment">
                <a href="{{ route('payment.create') }}" class="btn btn-primary">Proceed with PayPal</a>
            </div>
        
            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Submit</button>
        </form>
        
        <script>
            let rowIndex = 1;
            
            function addRow() {
                const table = document.getElementById('timetable-table').getElementsByTagName('tbody')[0];
                const newRow = table.insertRow();
                newRow.innerHTML = `
                    <td><input type="text" name="timetable[${rowIndex}][day]" placeholder="e.g., Monday" required pattern="^(Monday|Tuesday|Wednesday|Thursday|Friday|Saturday|Sunday)$" title="Enter a valid day (e.g., Monday)"></td>
                    <td><input type="text" name="timetable[${rowIndex}][time]" placeholder="e.g., 10:00 - 12:00" required pattern="^[0-9]{2}:[0-9]{2} - [0-9]{2}:[0-9]{2}$" title="Enter a valid time range (e.g., 10:00 - 12:00)"></td>
                    <td><button type="button" onclick="removeRow(this)">Remove</button></td>
                `;
                rowIndex++;
            }
        
            function removeRow(button) {
                const row = button.closest('tr');
                row.remove();
            }
        
            // Image preview function
            function previewImage(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    const output = document.getElementById('mainPicturePreview');
                    output.style.display = 'block';
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        
            // Additional form validation
            function validateForm() {
                const clubName = document.getElementById('clubName').value;
                if (clubName.length < 3 || clubName.length > 50) {
                    alert('Club name must be between 3 and 50 characters.');
                    return false;
                }
                
                const clubDescription = document.getElementById('clubDescription').value;
                if (clubDescription.length < 10 || clubDescription.length > 500) {
                    alert('Club description must be between 10 and 500 characters.');
                    return false;
                }
                
                return true;
            }
        </script>
        
    </div>

    <footer style="background:linear-gradient(rgba(0,0,0,0.5),#0066cc), url('{{ asset('images/background.jpeg') }}'); padding: 60px; display: flex; justify-content: space-around;">
        <div class="footer-content" style="display: flex; justify-content: space-around; gap: 20px; width: 100%;">
            <!-- Footer Logo -->
            <div class="footer-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Optic Clubs Logo" class="logo" style="width: 150px; height: auto; margin-right: 100px;">
            </div>

            <!-- Footer Text -->
            <div class="footer-text" style="width: 40%; margin-left: -200px;">
                <h3>Terms & Conditions</h3>
                <p>"Optic is your gateway to a vibrant community of sports enthusiasts, promoting all indoor and outdoor sports..."</p>
            </div>

            <!-- Social Media Links -->
            <div class="social-media">
                <h3>Social Media</h3>
                <a href="#"><img src="{{ asset('images/instagram.jpeg') }}" class="logo1" alt="Instagram" style="width: 30px; height: auto;"> Optic_clubs</a><br>
                <a href="#"><img src="{{ asset('images/facebook.jpeg') }}" class="logo1" alt="Facebook" style="width: 30px; height: auto;"> Optic_clubs</a><br>
                <a href="#"><img src="{{ asset('images/twitter.jpeg') }}" class="logo1" alt="Twitter" style="width: 30px; height: auto;"> @Optic_clubs</a>
            </div>
        </div>
    </footer>
@endsection
