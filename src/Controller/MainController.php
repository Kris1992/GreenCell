<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\CSVFileValidator\CSVFileValidatorInterface;
use App\Services\FileReader\FileReaderInterface;
use App\Services\ArraySorter\ArraySorterInterface;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage", methods={"GET"})
     */
    public function index(CSVFileValidatorInterface $CSVFileValidator, FileReaderInterface $fileReader, ArraySorterInterface $arraySorter, string $csvPath)
    {
        try {
            $isValid = $CSVFileValidator->validate($csvPath);
        } catch (\Exception $e) {
            $this->addFlash('warning', $e->getMessage());
            return $this->redirectToRoute('app_error');
        }
        
        if (!$isValid) {
            $this->addFlash('warning', 'Given csv file is probably invalid!');
            return $this->redirectToRoute('app_error');
        } 

        try {
            $fileReader->read($csvPath);
            $data = $fileReader->parseToArray();
        } catch (\Exception $e) {
            $this->addFlash('warning', $e->getMessage());
            return $this->redirectToRoute('app_error');
        }

        try {
            $emailSorted = $arraySorter->sort($data, 'email');
            $noteSorted = $arraySorter->sort($data, 'note', 'DESC');
            $createdSorted = $arraySorter->sort($data, 'created');
        } catch (\Exception $e) {
            $this->addFlash('warning', $e->getMessage());
            return $this->redirectToRoute('app_error');
        }
        
        $highestNoteWorker = $noteSorted[0];
        $oldestCreated = $createdSorted[0];

        return $this->render('main/index.html.twig', [
            'emailSorted' => $emailSorted,
            'highestNoteWorker' => $highestNoteWorker,
            'oldestCreated' => $oldestCreated
        ]);
    }

    /**
     * @Route("/error", name="app_error", methods={"GET"})
     */
    public function error()
    {

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
