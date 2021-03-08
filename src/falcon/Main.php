<?php

/*
* Advanced Manager plugin system for Factions Server
* Author: Dev
* Software: Pocketmine-MP
*/

namespace Items;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\item\{Item, ItemIds};

use pocketmine\entity\{Effect, EffectInstance};

use pocketmine\utils\TextFormat as Color;

class Main extends PluginBase implements Listener {
	
	public $cooldownForce = []; # Id del Cooldown de Fuerza
	
	public $cooldownRes = []; # Id del Cooldown de Resistencia
	
	public $cooldownInv = []; # Id del Cooldown de Invisibilidad
	
	public $cooldownJum = []; # Id del Cooldown de Saltar
	
	public $cooldownVel = []; # Id del Cooldown de Velocidad
	
	public $cooldownReg = []; # Id del Cooldown de Regeneración
	
	
	public function onEnable(){
		
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
		$this->getServer()->getLogger()->info("[Especiales] Plugin Enabled by: Items especiales");
		
	}
	
	public function onItems(PlayerInteractEvent $ev){
		
		$player = $ev->getPlayer();
		
		$item = $ev->getItem();
		
		if($item->getID() == 369){
			
			if(!isset($this->cooldownForce[$player->getName()])){
				
		       $this->cooldownForce[$player->getName()] = time() + 90;
		
               $player->addEffect((new EffectInstance(Effect::getEffect(Effect::STRENGTH)))->setDuration(20 * 10)->setAmplifier(1)->setVisible(true));
               
		       $player->sendMessage(Color::BOLD . Color::GRAY . "» " . Color::RESET . Color::GREEN . "Obtuviste el efecto: " . Color::YELLOW . "Fuerza");
		
	        } else if(time() < $this->cooldownForce[$player->getName()]){
		
			      $reaming = $this->cooldownForce[$player->getName()] - time();
			
			      $player->sendPopup(Color::RED . "Espera " . Color::YELLOW.$reaming . "s" . Color::RED . " para usar esto!");
			
		    } else {
			
			   unset($this->cooldownForce[$player->getName()]);
			
		    }
		    
		} else if($item->getID() == 288){
			
			if(!isset($this->cooldownSlow[$player->getName()])){
				
		       $this->cooldownSlow[$player->getName()] = time() + 1;
		
	        } else if(time() < $this->cooldownSlow[$player->getName()]){
		
			      $reaming = $this->cooldownSlow[$player->getName()] - time();
			
		    } else {
			
			   unset($this->cooldownSlow[$player->getName()]);
			
		    }

		} else if($item->getID() == 336){
			
			if(!isset($this->cooldownRes[$player->getName()])){
				
		       $this->cooldownRes[$player->getName()] = time() + 60;
		
               $player->addEffect((new EffectInstance(Effect::getEffect(Effect::RESISTANCE)))->setDuration(20 * 20)->setAmplifier(1)->setVisible(true));
               
		       $player->sendMessage(Color::BOLD . Color::GRAY . "» " . Color::RESET . Color::GREEN . "Obtuviste el efecto: " . Color::YELLOW . "Resistencia");
		
	        } else if(time() < $this->cooldownRes[$player->getName()]){
		
			      $reaming = $this->cooldownRes[$player->getName()] - time();
			
			      $player->sendPopup(Color::RED . "Espera " . Color::YELLOW.$reaming . "s" . Color::RED . " para usar esto!");
			
		    } else {
			
			   unset($this->cooldownRes[$player->getName()]);
			   
		    }
		    
		    } else if($item->getID() == 350){
			
			if(!isset($this->cooldownInv[$player->getName()])){
				
		       $this->cooldownInv[$player->getName()] = time() + 60;
		
               $player->addEffect((new EffectInstance(Effect::getEffect(Effect::INVISIBILITY)))->setDuration(20 * 600)->setAmplifier(1)->setVisible(true));
               
		       $player->sendMessage(Color::BOLD . Color::GRAY . "» " . Color::RESET . Color::GREEN . "Obtuviste el efecto: " . Color::YELLOW . "Invisibilidad");
		
	        } else if(time() < $this->cooldownInv[$player->getName()]){
		
			      $reaming = $this->cooldownInv[$player->getName()] - time();
			
			      $player->sendPopup(Color::RED . "Espera " . Color::YELLOW.$reaming . "s" . Color::RED . " para usar esto!");
			
		    } else {
			
			   unset($this->cooldownInv[$player->getName()]);
			   
		    }
			   
		    } else if($item->getID() == 340){
			
			if(!isset($this->cooldownJum[$player->getName()])){
				
		       $this->cooldownJum[$player->getName()] = time() + 60;
		
               $player->addEffect((new EffectInstance(Effect::getEffect(Effect::JUMP_BOOST)))->setDuration(20 * 10)->setAmplifier(1)->setVisible(true));
               
		       $player->sendMessage(Color::BOLD . Color::GRAY . "» " . Color::RESET . Color::GREEN . "Obtuviste el efecto: " . Color::YELLOW . "Salto");
		       
		
	        } else if(time() < $this->cooldownJum[$player->getName()]){
		
			      $reaming = $this->cooldownJum[$player->getName()] - time();
			
			      $player->sendPopup(Color::RED . "Espera " . Color::YELLOW.$reaming . "s" . Color::RED . " para usar esto!");
			
		    } else {
			
			   unset($this->cooldownJum[$player->getName()]);

		    }
			   
		    } else if($item->getID() == 289){
			
			if(!isset($this->cooldownVel[$player->getName()])){
				
		       $this->cooldownVel[$player->getName()] = time() + 60;
		
               $player->addEffect((new EffectInstance(Effect::getEffect(Effect::SPEED)))->setDuration(20 * 30)->setAmplifier(2)->setVisible(true));
               
		       $player->sendMessage(Color::BOLD . Color::GRAY . "» " . Color::RESET . Color::GREEN . "Obtuviste el efecto: " . Color::YELLOW . "Velocidad");
		       
		
	        } else if(time() < $this->cooldownVel[$player->getName()]){
		
			      $reaming = $this->cooldownVel[$player->getName()] - time();
			
			      $player->sendPopup(Color::RED . "Espera " . Color::YELLOW.$reaming . "s" . Color::RED . " para usar esto!");
			
		    } else {
			
			   unset($this->cooldownVel[$player->getName()]);
			   
		    }
			   
		    } else if($item->getID() == 337){
			
			if(!isset($this->cooldownReg[$player->getName()])){
				
		       $this->cooldownReg[$player->getName()] = time() + 60;
		
               $player->addEffect((new EffectInstance(Effect::getEffect(Effect::REGENERATION)))->setDuration(20 * 30)->setAmplifier(2)->setVisible(true));
               
		       $player->sendMessage(Color::BOLD . Color::GRAY . "» " . Color::RESET . Color::GREEN . "Obtuviste el efecto: " . Color::YELLOW . "Regeneración");
		       
		
	        } else if(time() < $this->cooldownReg[$player->getName()]){
		
			      $reaming = $this->cooldownReg[$player->getName()] - time();
			
			      $player->sendPopup(Color::RED . "Espera " . Color::YELLOW.$reaming . "s" . Color::RED . " para usar esto!");
			
		    } else {
			
			   unset($this->cooldownReg[$player->getName()]);
		    }
			
		}
		
	}
	
	public function onInteract(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $item = $event->getItem();
        
        switch($item->getId()) {
            case Item::NETHER_STAR:
               $event->getItem()->setCount($event->getItem()->getCount() - 1);
               $player->getInventory()->setItemInHand($event->getItem()->getCount() > 0 ? $event->getItem() : Item::get(Item::AIR));
        }
               $player = $event->getPlayer();
        $item = $event->getItem();
        
        switch($item->getId()) {
            case Item::NETHER_BRICK:
               $event->getItem()->setCount($event->getItem()->getCount() - 1);
               $player->getInventory()->setItemInHand($event->getItem()->getCount() > 0 ? $event->getItem() : Item::get(Item::AIR));
        }
               $player = $event->getPlayer();
        $item = $event->getItem();
        
        switch($item->getId()) {
            case Item::NETHER_WART:
               $event->getItem()->setCount($event->getItem()->getCount() - 1);
               $player->getInventory()->setItemInHand($event->getItem()->getCount() > 0 ? $event->getItem() : Item::get(Item::AIR));
        }
        $player = $event->getPlayer();
        $item = $event->getItem();
        
        switch($item->getId()) {
            case Item::NETHER_BRICK:
               $event->getItem()->setCount($event->getItem()->getCount() - 1);
               $player->getInventory()->setItemInHand($event->getItem()->getCount() > 0 ? $event->getItem() : Item::get(Item::AIR));
        }
               $player = $event->getPlayer();
        $item = $event->getItem();
        
        switch($item->getId()) {
            case Item::PUFFERFISH:
               $event->getItem()->setCount($event->getItem()->getCount() - 1);
               $player->getInventory()->setItemInHand($event->getItem()->getCount() > 0 ? $event->getItem() : Item::get(Item::AIR));
        }
        return true;
    }
	
}

?>