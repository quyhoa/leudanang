<?php 
class ToolComponent extends Component {
	public function sum($carts){
		$total = 0;
			foreach($carts as $cart){
				$total += $cart['price_sales']*$cart['quantity'];
			}
			return $total;
	}
}