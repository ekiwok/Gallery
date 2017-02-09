<?php

namespace App\Query;

use Doctrine\ORM\EntityRepository;
use Gallery\Entity\Album;
use Gallery\Query\AlbumQuery as AlbumQueryInterface;
use Gallery\ViewObject\AlbumView;

class AlbumQuery extends EntityRepository implements AlbumQueryInterface
{
    /**
     * @return AlbumView[]
     */
    public function findAllAlbums()
    {
        $query = $this->_em->getConnection()->query('
          SELECT a.uuid, a.name, COUNT(i.uuid)
          FROM albums a LEFT JOIN images i on i.album_uuid = a.uuid
          GROUP BY a.uuid
          ');

        $result =  $query->fetchAll();

        foreach ($result as $key => $row) {
            $result[$key] = new AlbumView(current($row), next($row), next($row));
        };

        return $result;
    }

    /**
     * @return Album|null
     */
    public function findOneByUuid($uuid)
    {
        return $this->findOneBy(['uuid' => $uuid]);
    }
}
