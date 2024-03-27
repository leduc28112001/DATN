<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
<?php
require './config/database.php';
require './models/translate-model.php';
$sql = "SELECT * FROM province";
$result = mysqli_query($db, $sql);
?>
<!-- /* --------------------------------- VIEW --------------------------------- */ -->
<style>
    .location {
        grid-column: 1/3;
        display: flex;
        gap: 10px;
    }

    .box-location {
        width: 100%;
    }

    .box-location label {
        text-align: left;
    }

    .box-location select {
        width: 100%;
        padding: 10px;
        border: 1.5px solid #dcdcdc;
        border-radius: 2px;
    }
</style>
<div class="location">
    <div class="box-location">
        <select id="province" name="province" class="form-control">
            <?php
            if (isset($dataOld)) {
                $translatedProvince = translateId($dataOld['id'], "province");
                if ($translatedProvince) {
                    echo '<option value="' . $translatedProvince['province_id'] . '">' . $translatedProvince['name'] . '</option>';
                }
            }
            ?>
            <option value="">Chọn một tỉnh</option>
            <!-- populate options with data from your database or API -->
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option value="<?php echo $row['province_id'] ?>"><?php echo $row['name'] ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="box-location">
        <select id="district" name="district" class="form-control">
            <?php
            if (isset($dataOld)) {
                $translatedDistrict = translateId($dataOld['id'], "district");
                if ($translatedDistrict) {
                    echo '<option value="' . $translatedDistrict['district_id'] . '">' . $translatedDistrict['name'] . '</option>';
                }
            }
            ?>
            <option value="">Chọn một quận/huyện</option>
        </select>
    </div>
    <div class="box-location">
        <select id="wards" name="wards" class="form-control">
            <?php
            if (isset($dataOld)) {
                $translatedWards = translateId($dataOld['id'], "wards");
                if ($translatedWards) {
                    echo '<option value="' . $translatedWards['wards_id'] . '">' . $translatedWards['name'] . '</option>';
                }
            }
            ?>
            <option value="">Chọn một xã</option>
        </select>
    </div>
</div>
<script src="./assets/javascript/location.js"></script>
<!-- /* --------------------------------- VIEW --------------------------------- */ -->
