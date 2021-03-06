<?php

class Sama_Cartminamount_Model_Sales_Quote_Address extends Mage_Sales_Model_Quote_Address
{
	public function validateMinimumAmount()
    {
    	$check = parent::validateMinimumAmount();
		
		if ($check) return true; // check validated, let it pass.

		/**
		 * Do custom check
		 */
        $amount = Mage::getStoreConfig('sales/minimum_order/amount', $storeId);
        $checkFormula = Mage::getStoreConfig('sales/minimum_order/formula', $storeId);
		
		preg_match_all('/\{\{([a-zA-Z_]+)\}\}/i', $checkFormula, $fields);
		
		foreach ($fields[1] as $i => $field) {
			$checkFormula = str_replace($fields[0][$i], '$this->getQuote()->getData("'.$field.'")', $checkFormula);
		}
		
		eval('$totalAmount = '.$checkFormula.';');

        if ((float)$totalAmount < $amount) {
            return false;
        }
        return true;
    }
}
