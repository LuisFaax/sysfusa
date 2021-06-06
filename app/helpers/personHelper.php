<?php




    const MINIMUM_QUANTITY = 1;
    const DEFAULT_INSTANCE = 'person-cart';

    protected $session;
    protected $instance;

    

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
    public function addPerson($id, $name, $email, $type, $person_type, $ethnic_group, $gender, $address, $identification, $phone, $age, $disabled, $options = []): void
    {
        $cartItem = $this->createCartItem($name, $email, $type, $person_type, $ethnic_group, $gender, $address, $identification, $phone, $age, $disabled, $options);

        $content = $this->getContent();

        if ($content->has($id)) {
            $cartItem->put('quantity', $content->get($id)->get('quantity') + $quantity);
        }

        $content->put($id, $cartItem);

        $this->session->put(self::DEFAULT_INSTANCE, $content);
    }

    /**
     * Updates the quantity of a cart item.
     *
     * @param string $id
     * @param string $action
     * @return void
     */
    public function updatePerson($id, $name, $email, $type, $person_type, $ethnic_group, $gender, $address, $identification, $phone, $age, $disabled, $options = [],  $action): void
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
    public function removePerson(string $id): void
    {
        $content = $this->getContent();

        if ($content->has($id)) {
            $this->session->put(self::DEFAULT_INSTANCE, $content->except($id));
        }
    }

    /**
     * Clears the cart.
     *
     * @return void
     */
    public function clear(): void
    {
       // $this->session->forget(self::DEFAULT_INSTANCE);
    }

    

    

    /**
     * Returns the content of the cart.
     *
     * @return Illuminate\Support\Collection
     */
    protected function getContent(): Collection
    {
        return $this->session->has(self::DEFAULT_INSTANCE) ? $this->session->get(self::DEFAULT_INSTANCE) : collect([]);
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
