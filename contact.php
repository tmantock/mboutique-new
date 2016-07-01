<?php
date_default_timezone_set('America/Los_Angeles');
?>
<div id="map" class = "header-image">
  <div class="header-text">
    <h1>Contact Us</h1>
  </div>
</div>
<article id = "contacts" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 body">
    <div id = "days-address" class = 'col-lg-5 col-md-5 col-xs-12 mdl-card mdl-shadow--2dp'>
        <h3 class="move-right">Visit us!</h3>
        <ul>
            <li>Monday - Friday | 10am - 9pm</li>
            <li>Saturday | 10am - 8pm</li>
            <li>Sunday | 11am - 7pm</li>
            <li>Closed Thanksgiving Day,
            Christmas Day,<br>
            and Easter Day</li>
        </ul>

        <p class="move-right">1625 Post St<br>San Francisco, CA 94115</p>

        <p class="move-right">949 800-3111</p>

        <a href = "#" class="move-right">order@mboutique.com</a>

        <p class="move-right">Send your questions, comments and flavor<br>suggestions or place an order</p>
    </div>

    <div id = "contact-form" class = 'col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-xs-12 mdl-card mdl-shadow--2dp'>
      <fieldset>
        <h3>Need to let us know something?</h3>
        <div class="form-group">
          <label for="inputName" class="col-lg-2 control-label">Name</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="inputName" placeholder="Full Name">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-lg-2 control-label">Email</label>
          <div class="col-lg-10">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email Address">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPhone" class="col-lg-2 control-label">Phone</label>
          <div class="col-lg-10">
            <input type="text" class="form-control" id="inputPhone" placeholder="Phone Number">
          </div>
          <div class="form-group">
            <label for="inputSubject" class="col-lg-2 control-label">Subject</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="inputSubject" placeholder="Phone Number">
            </div>
          </div>
          <div class="form-group">
            <label for="contactComments" class="col-lg-2 control-label">Message</label>
            <div class="col-lg-10">
              <textarea class="form-control" rows="3" id="conctactComments"></textarea>
              <span class="help-block">Please leave your message here.</span>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2  contact-form-buttons">
                <button type="reset" class="col-sm-3 col-sm-offset-4 btn btn-default">Cancel</button>
                <button type="submit" class="col-sm-3 col-sm-offset-1 btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- <div class="map-container">
        <div id="map"></div>
    </div> -->
</article>
