<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Carrier Tracking URL Class
 *
 * @package		ExpressionEngine
 * @category	Plugin
 * @author		Ryan Shrum
 * @copyright	Copyright (c) 2013, Ryan Shrum
 * @link		http://www.ehousestudio.com
 */

$plugin_info = array(
  'pi_name'         => '{e} house studio Carrier Tracking URL',
  'pi_version'      => '1.0',
  'pi_author'       => 'Ryan Shrum',
  'pi_author_url'   => 'http://www.ehousestudio.com',
  'pi_description'  => 'Returns URL for tracking number based on carrier (FedEx, UPS & DHL).'
);

class ehs_tracking_url {

	public $return_data = '';
	
	public function __construct()
	{
		
		$this->EE =& get_instance();

		$shipping_method = $this->EE->TMPL->fetch_param('shipping_method');
		
		$tracking_no = $this->EE->TMPL->fetch_param('tracking_no');	
		
		$shipping_method = explode(' ', $shipping_method);
		
		$carrier =  $shipping_method[0];

		switch ( $carrier ) {
			
			case 'FedEx':
				
				$url = 'http://www.fedex.com/Tracking?action=track&tracknumbers=';

				break;

			case 'UPS':
				
				$url = 'http://wwwapps.ups.com/WebTracking/track?track=yes&trackNums=';
				
				break;
			
			case 'DHL':
			
				$url = 'http://www.dhl.com/content/g0/en/express/tracking.shtml?brand=DHL&AWB=';

				break;

			default:
			
				$trackable = false;
				
				break;
				
		}
		
		$url .= $tracking_no;
		

		$this->return_data = $url;
	}
	
}

/* End of file pi.ehs_tracking_url.php */
/* Location: ./system/expressionengine/third_party/ehs_tracking_url/pi.ehs_tracking_url.php */