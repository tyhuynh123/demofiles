<?php

use Aws\S3\S3Client;
use Aws\Common\Aws;

require_once __DIR__ . '/vendor/autoload.php';

$config = require('config.php');

//S3

$s3 = S3Client::factory(
                        array(
                                'credentials' => array(
                                        'key' => $config['s3']['key'],
                                        'secret' => $config['s3']['secret'],
                                ),
                                'version' => $config['s3']['version'],
                                'region'  => $config['s3']['region']
                        )
                );

