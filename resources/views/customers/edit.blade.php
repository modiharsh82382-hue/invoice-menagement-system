<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>

<h1>Edit Customer</h1>

<form action="/customers/{{ $customer->id }}" method="POST">

    @csrf
    @method('PUT')

    <!-- Customer Name -->
    <label>Customer Name</label><br>
    <input type="text"
           name="customer_name"
           value="{{ old('customer_name', $customer->customer_name) }}">
    <br>
    @error('customer_name')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <!-- Email -->
    <label>Email</label><br>
    <input type="email"
           name="email"
           value="{{ old('email', $customer->email) }}">
    <br>
    @error('email')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <!-- Phone -->
    <label>Phone</label><br>
    <input type="tel"
           name="phone"
           value="{{ old('phone', $customer->phone) }}"
           maxlength="10"
           pattern="[0-9]{10}"
           title="Enter exactly 10 digits"
           required>
    <br>
    @error('phone')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <!-- Address -->
    <label>Address</label><br>
    <textarea name="address">{{ old('address', $customer->address) }}</textarea>
    <br>
    @error('address')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <!-- GST Number -->
    <label>GST Number</label><br>
    <input type="text"
           name="gst_number"
           value="{{ old('gst_number', $customer->gst_number) }}"
           maxlength="15"
           style="text-transform:uppercase;">
    <br>
    @error('gst_number')
        <span style="color:red;">{{ $message }}</span>
    @enderror
    <br><br>

    <button type="submit">Update Customer</button>

    <a href="/customers">
        <button type="button">Cancel</button>
    </a>

</form>

</body>
</html>