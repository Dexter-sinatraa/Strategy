<?php
// Інтерфейс стратегії
interface Strategy {
    public function doAlgorithm(array $data): array;
}

// Конкретні стратегії
class ConcreteStrategyA implements Strategy {
    public function doAlgorithm(array $data): array {
        sort($data);
        return $data;
    }
}

class ConcreteStrategyB implements Strategy {
    public function doAlgorithm(array $data): array {
        rsort($data);
        return $data;
    }
}

// Контекст, який використовує стратегію
class Context {
    private $strategy;

    public function setStrategy(Strategy $strategy) {
        $this->strategy = $strategy;
    }

    public function executeAlgorithm(array $data): array {
        return $this->strategy->doAlgorithm($data);
    }
}

// Використання паттерна Стратегія
$context = new Context();

$context->setStrategy(new ConcreteStrategyA());
$dataA = [1, 5, 3, 2, 4];
$resultA = $context->executeAlgorithm($dataA);
echo implode(', ', $resultA);  // Output: 1, 2, 3, 4, 5

$context->setStrategy(new ConcreteStrategyB());
$dataB = [1, 5, 3, 2, 4];
$resultB = $context->executeAlgorithm($dataB);
echo implode(', ', $resultB);  // Output: 5, 4, 3, 2, 1
