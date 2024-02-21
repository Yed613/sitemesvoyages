<?php



namespace App\Tests\Repository;

use App\Entity\Visite;
use App\Repository\VisiteRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Description of VisiteRepositoryTest
 *
 * @author yedid
 */
class VisiteRepositoryTest extends KernelTestCase {
    public function recupRepository(): VisiteRepository{
        self::bootKernel();
        $repository = self::getContainer()->get(VisiteRepository::class);
        return $repository;
    }
    public function testNbVisites(){
       $repository = $this->recupRepository();
       $nbVisites = $repository->count([]);
       $this->assertEquals(2,$nbVisites);
    }
    /**
     * Création d'une instance de Visite avec ville, pays et dateCreation
     * @return Visite
     */
    public function newVisite(): Visite{
        $visite = (new Visite())
                ->setVille("New York")
                ->setPays("USA")
                ->setDatecreation(new DateTime("now"));
        return $visite;
    }
     public function testAddVisite(){
        $repository = $this->recupRepository();
        $visite = $this->newVisite();
        $nbVisites = $repository->count([]);
        $repository->add($visite, true);
        $this->assertEquals($nbVisites + 1, $repository->count([]), "erreur lors de l'ajout");
    }

}
