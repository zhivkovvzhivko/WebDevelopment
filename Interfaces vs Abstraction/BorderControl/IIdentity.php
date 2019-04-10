<?php

interface IIdentity
{
    public function getFakeId(string $id) : string;
}