<form
  name="events-form"
  class="events-form"
  action="javascript: ;"
  method="post">
  <input type="text" name="datefilter" class="date-range-picker" placeholder="Dates Needed" value="" required/>
  <select name="people_attending" class="form-select number-attending" required>
    <option value="" disabled selected>Number of People Attending</option>
    <option value="0-10">0-10</option>
    <option value="10-20">10-20</option>
    <option value="20-30">20-30</option>
    <option value="30-40">30-40</option>
    <option value="40+">40+</option>
  </select>
  <select name="need_lodging" class="form-select need-lodging" required>
    <option value="" disabled selected>Need Lodging?</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
  </select>
  <input type="text" name="occasion" class="occasion" placeholder="What's the Occasion?" required/>
  <input type="text" name="name" class="contact-name" placeholder="Name"/>
  <input type="email" name="email" class="contact-email" placeholder="Email" required/>
  <textarea name="MESSAGE" class="event-info" placeholder="Message"></textarea>
  <div class="event-submit">
    <button name="submit" type="submit" id="eventform_submit_action">Submit</button>
  </div>
</form>