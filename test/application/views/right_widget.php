<div class="right_widget"> <!-- Start From Here Right Container -->
    <!--jQuery Auto Populate Start From Here-->
    <div class="ui-widget" style="margin-top: 10px;">
        <legend for="tags">Search: </legend>
        <input id="tags">
    </div>
    <!--End Auto Populate-->
    <?php
    if (isset($login_register)) {
        echo $login_register;
    }
    ?>

    <?php
    if (isset($user_welcome)) {
        echo $user_welcome;
    }
    ?>

    <fieldset style="border: none; width: 100%;"> <!-- Facebook Like script --> 
        <div class="fb-like-box" data-href="https://www.facebook.com/physiohealthrs" data-width="188" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
    </fieldset>

    <fieldset style="border: none;">
        <ul id="right_ads">
            <li>170 x 100</li>
            <li>170 x 100</li>
            <li>170 x 100</li>
        </ul>
    </fieldset>

</div> <!-- End From Here Right Container -->