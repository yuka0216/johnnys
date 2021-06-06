<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Artist as ArtistModel;
use Domain\Model\Factory\ArtistFactory;
use Domain\Service\Repository\ArtistRepositoryInterface;
use Illuminate\Http\Request;

final class ArtistRepository implements ArtistRepositoryInterface
{
    const NAME_LABEL = "name";
    const GROUP_LABEL = "group";
    const BLOOD_TYPE_LABEL = "blood_type";
    const BIRTHDAY_LABEL = "birthday";
    const JOINED_DATE_LABEL = "joined_date";

    private $artistModel;

    public function __construct(ArtistModel $artistModel)
    {
        $this->artistModel = $artistModel;
    }

    public function findAll(): array
    {
        $targetArtists = $this->artistModel->all();
        return ArtistFactory::createMultiple($targetArtists);
    }

    public function fetchProfilesByGroupName(string $groupName): array
    {
        $targetArtists = $this->artistModel->where('group', $groupName)->get();
        return ArtistFactory::createMultiple($targetArtists);
    }


    public function fetchProfileBySearch($searchWordList): array
    {
        $judge = array_filter($searchWordList);
        if (empty($judge)) {
            return $this->findAll();
        }

        $query = $this->artistModel->query();
        foreach ($searchWordList as $columnName => $searchWord) {
            if ($columnName == self::BLOOD_TYPE_LABEL && (!empty($searchWord))) $query->where($columnName, $searchWord);
            if (!empty($searchWord)) $query->where($columnName, 'LIKE', '%' . $searchWord . '%');
        }
        $targetArtists = $query->get();

        return ArtistFactory::createMultiple($targetArtists);
    }

    public static function makeSearchWordList(Request $request): array
    {
        $searchWordList = [
            self::NAME_LABEL => $request->cond_name,
            self::GROUP_LABEL => $request->cond_group,
            self::BLOOD_TYPE_LABEL => $request->cond_blood,
            self::BIRTHDAY_LABEL => $request->cond_birthDay,
            self::JOINED_DATE_LABEL => $request->cond_joined,
        ];

        return $searchWordList;
    }
}
