<form
  name="contact-form"
  class="contact-form"
  action="javascript: ;"
  method="post">
  <input type="text"  name="first_name" placeholder="First Name"/>
  <input type="text"  name="last_name" placeholder="Last Name"/>
  <input type="email" name="email" placeholder="Email"/>
  <input type="tel"   name="phone" placeholder="Phone"/>
  <select name="reason" class="form-select contact-reason" required>
    <option value="" disabled selected>Reason for Inquiry</option>
    <option value="Booking-Room">Booking a Room</option>
    <option value="Booking-Van">Booking an Adventure Van</option>
    <option value="Experiences">Info about available Experiences</option>
    <option value="Amenities">Info about available Amenities and Services</option>
    <option value="General-Info">General Info</option>
  </select>
  <textarea name="message" placeholder="Message"></textarea>
  <button name="submit" type="submit" class="cta" id="contactform_submit_action">Submit</button>
</form>
