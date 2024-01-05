<div class="booking-form">
                        <h3>Booking Your Bus</h3>
                        <form method="post" action="index.php?action=find">
                            <div class="select-option">
                                <label for="departure-city">Departure City:</label>
                                <select name = "Depart_City"  class="selectpicker mh myDropDown" data-live-search="true">
                                    <?php foreach($Cities as $city) :?>
                                    <option data-tokens="<?php echo $city->getName(); ?>" value="<?php echo $city->getName(); ?>">
                                    <?php echo $city->getName();?>
                                    </option> 
                                    <?php endforeach; ?>    
                                </select>
                            </div>
                            <div class="select-option">
                                <label for="destination-city">Destination City:</label>
                                <select name = "Arrive_City"  >
                                    <?php foreach($Cities as $city) :?>
                                    <option value="<?php echo $city->getName(); ?>">
                                    <?php echo $city->getName();?>
                                    </option> 
                                    <?php endforeach; ?>    
                                </select>
                            </div>
                            <div class="check-date">
                                <label for="travel-date">Date of Travel:</label>
                                <input type="text" class="date-input" id="travel-date" name="datetime">
                                <i class="icon_calendar"></i>
                            </div>
                            <div class="select-option">
                                <label for="passengers">Travelers:</label>
                                <select id="passengers" name="passengers">
                                    <?php
                                    for ($i = 1; $i <= 8; $i++) {
                                        echo "<option value='$i'>$i Passenger" . ($i > 1 ? "s" : "") . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" class="submit-btn">search</button>
                        </form>
                    </div>

<style>
.myDropDown
{
   height: 50px;
   overflow: auto;
}
</style>