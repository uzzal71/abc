<?PHP
========================== ENERGY METER ====================
========================== ENERGY METER ====================
Alter TABLE `energy_meter`
MODIFY `positive_real_energy`  VARCHAR(100),
MODIFY `total_real_power` VARCHAR(100), 
MODIFY `total_apparent_power`  VARCHAR(100),
MODIFY `total_reactive_power`  VARCHAR(100),
MODIFY `total_power_factor`  VARCHAR(100),
MODIFY `frequency`  VARCHAR(100),
MODIFY `instantaneous_current_l1`  VARCHAR(100),
MODIFY `instantaneous_current_l2`  VARCHAR(100),
MODIFY `instantaneous_current_l3`  VARCHAR(100),
MODIFY `instantaneous_current_ln`  VARCHAR(100),
MODIFY `voltage_phase_l12`  VARCHAR(100),
MODIFY `voltage_phase_l23`  VARCHAR(100),
MODIFY `voltage_phase_l31`  VARCHAR(100),
MODIFY `voltage_phase_l1`  VARCHAR(100),
MODIFY `voltage_phase_l2`  VARCHAR(100),
MODIFY `voltage_phase_l3`  VARCHAR(100),
MODIFY `real_power_l1`  VARCHAR(100),
MODIFY `real_power_l2`  VARCHAR(100),
MODIFY `real_power_l3`  VARCHAR(100)
========================== ENERGY METER ====================
========================== ENERGY METER ====================


========================== temp_humidity ====================
========================== temp_humidity ====================
ALTER TABLE temp_humidity
MODIFY `temp` VARCHAR(100),
MODIFY `humidity` VARCHAR(100)

========================== temp_humidity ====================
========================== temp_humidity ====================




========================== FUEL ====================
========================== FUEL ====================
ALTER TABLE fuel
MODIFY `quantity` VARCHAR(100)
========================== FUEL ====================
========================== FUEL ====================

?>