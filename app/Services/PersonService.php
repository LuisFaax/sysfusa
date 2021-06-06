<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;

class PersonService {
    const MINIMUM_QUANTITY = 1;
    const DEFAULT_INSTANCE = 'person-cart';

    protected $session;
    protected $instance;

    /**
     * Constructs a new cart object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
    public function __construct()
    {
    	//SessionManager $session
        //$this->session = $session;
    }

    /**
     * Adds a new item to the cart.
     *
     * @param string $id
     * @param string $name
     * @param string $email
     * @param string $type
     * @param string $person_type
     * @param string $ethnic_group
     * @param string $gender
     * @param string $address
     * @param string $identification
     * @param string $phone
     * @param string $age
     * @param string $disabled
     * @param array $options
     * @return void
     */
    public function add($id, $name, $email, $type, $person_type, $ethnic_group, $gender, $address, $identification, $phone, $age, $disabled, $options = []): void
    {
        $cartItem = $this->createCartItem($name, $email, $type, $person_type, $ethnic_group, $gender, $address, $identification, $phone, $age, $disabled, $options);

        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem->put('quantity', $content->get($id)->get('quantity') + $quantity);
        }

        $content->put($id, $cartItem);

        session()->put(self::DEFAULT_INSTANCE, $content);
    }

    /**
     * Updates the quantity of a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function update($id, $name, $email, $type, $person_type, $ethnic_group, $gender, $address, $identification, $phone, $age, $disabled, $options = [],  $action): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
        	$this->cart->remove($id);

        }
            
    }

    /**
     * Removes an item from the cart.
     *
     * @param string $id
     * @return void
     */
    public function remove(string $id): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            session()->put(self::DEFAULT_INSTANCE, $content->except($id));
        }
    }

    /**
     * Clears the cart.
     *
     * @return void
     */
    public function clear(): void
    {
        session()->forget(self::DEFAULT_INSTANCE);
    }

    /**
     * Returns the content of the cart.
     *
     * @return Illuminate\Support\Collection
     */
    public function content(): Collection
    {
        return is_null(session()->get(self::DEFAULT_INSTANCE)) ? collect([]) : session()->get(self::DEFAULT_INSTANCE);
    }

    

    /**
     * Returns the content of the cart.
     *
     * @return Illuminate\Support\Collection
     */
    protected function getContent(): Collection
    {
        return session()->has(self::DEFAULT_INSTANCE) ? session()->get(self::DEFAULT_INSTANCE) : collect([]);
    }

    /**
     * Creates a new cart item from given inputs.
     *
     * @param string $name
     * @param string $price
     * @param string $quantity
     * @param array $options
     * @return Illuminate\Support\Collection
     */
    protected function createCartItem(string $name,string $email,string $type,string $person_type,string $ethnic_group,string $gender,string $address,string $identification,string $phone,string $age,string $disabled, array $options): Collection
    {
        //$price = floatval($price);
        //$quantity = intval($quantity);
/*
        if ($quantity < self::MINIMUM_QUANTITY) {
            $quantity = self::MINIMUM_QUANTITY;
        }
        */

        return collect([
            'name' => $name,
            'email' => $email,
            'type' => $type,
            'person_type' => $person_type,
            'ethnic_group' => $ethnic_group,
            'gender' => $gender,
            'address' => $address,
            'identification' => $identification,
            'phone' => $phone,
            'age' => $age,
            'disabled' => $disabled,
            'options' => $options,
        ]);
    }
}