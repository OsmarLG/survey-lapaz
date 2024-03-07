<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Distrito;

class DistritoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => 'DISTRITO 1',
            'status' => true,
            'estado_id' => 1,
        ];
    }

    /**
     *
     * @return Factory
     */
    public function distrito2()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 2',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito3()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 3',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito4()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 4',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito5()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO %',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito6()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 6',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito7()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 7',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito8()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 8',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito9()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 9',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito10()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 10',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito11()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 11',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito12()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 12',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito13()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 13',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito14()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 14',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito15()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 15',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }

    public function distrito16()
    {
        return $this->state(function (array $attributes) {
            return [
                'nombre' => 'DISTRITO 16',
                'status' => true,
                'estado_id' => 1,
            ];
        });
    }
}