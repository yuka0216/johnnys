<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\Artist as ArtistModel;
use DateTime;
use Domain\Model\Entity\Artist;
use Domain\Model\ValueObject\ArtistBloodType;
use Domain\Model\ValueObject\ArtistGroup;
use Domain\Model\ValueObject\ArtistId;
use Domain\Model\ValueObject\ArtistImagePath;
use Domain\Model\ValueObject\ArtistName;
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
        $artists = $this->artistModel->all();
        return self::makeEntity($artists);
    }

    public function fetchProfileBySnowman(): array
    {
        $targetArtistList = $this->artistModel->where('group', "Snow Man")->get();
        return self::makeEntity($targetArtistList);
    }


    public function fetchProfileBySearch($searchWordList): array
    {
        $query = $this->artistModel->query();
        $judge = array_filter($searchWordList);
        if (empty($judge)) {
            return $this->findAll();
        }

        foreach ($searchWordList as $columnName => $searchWord) {
            if ($columnName == self::BLOOD_TYPE_LABEL && (!empty($searchWord))) $query->where($columnName, $searchWord);
            if (!empty($searchWord)) $query->where($columnName, 'LIKE', '%' . $searchWord . '%');
        }

        $targetArtistList = $query->get();
        return self::makeEntity($targetArtistList);
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

    public static function makeEntity($targetArtistList): array
    {
        $artistEntities = [];
        foreach ($targetArtistList as $targetArtist) {
            $artistEntities[] = new Artist(
                new ArtistId($targetArtist->id),
                new ArtistName($targetArtist->name),
                new ArtistGroup($targetArtist->group),
                $targetArtist->birthday,
                new ArtistBloodType($targetArtist->blood_type),
                $targetArtist->joined_date,
                new ArtistImagePath($targetArtist->image_path)
            );
        }
        return $artistEntities;
    }
}
