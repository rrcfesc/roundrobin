<?php
declare(strict_types=1);
/**
 * Rioxygen
 * @license  BS3-Clausule
 * @author Ricardo Ruiz <ricardojesus.ruizcruz@protonmail.com>
 */

final class RoundRobin
{
    /**
     * @param array $players
     * @return array
     */
    public function generate(array $players)
    {
        $n = count($players);
        for ($r = 0; $r < $n - 1; $r++) {
            for ($i = 0; $i < $n / 2; $i++) {
                $rounds[$r][] = [$players[$i], $players[$n-1 - $i]];
            }
            // Perform round-robin shift, keeping first player in its spot:
            $players[] = array_splice($players, 1, 1)[0];
        }
        $players[] = array_splice($players, 1, 1)[0];
        return $rounds;
    }
}
