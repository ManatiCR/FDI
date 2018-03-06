<?php

/**
 * @file
 * Defines a mutation to create a node reporte.
 */

namespace Drupal\fdi_default_content\Plugin\GraphQL\Mutations;

use Drupal\graphql_core\Plugin\GraphQL\Mutations\Entity\CreateEntityBase;
use Youshido\GraphQL\Execution\ResolveInfo;
/**
 * Simple mutation for creating a new reporte node.
 *
 * @GraphQLMutation(
 *   id = "create_reporte",
 *   entity_type = "node",
 *   entity_bundle = "reporte",
 *   secure = true,
 *   name = "createReporte",
 *   type = "EntityCrudOutput!",
 *   arguments = {
 *     "input" = "ReporteInput"
 *   }
 * )
 */
class CreateReporte extends CreateEntityBase {
  /**
   * {@inheritdoc}
   */
  protected function extractEntityInput(array $args, ResolveInfo $info) {
    $codigo_seguimiento = 0;
    $result = 1;
    do {
      $codigo_seguimiento = substr(md5(uniqid(mt_rand(), TRUE)), 0, 8);
      $query = \Drupal::service('entity.query')
        ->get('node')
        ->condition('type', 'reporte')
        ->condition('field_codigo_de_seguimient', $codigo_seguimiento);
      $result = $query->execute();
    } while (count($result) > 0);
    return [
      'title' => $args['input']['title'],
      'field_correo' => $args['input']['field_correo'],
      'body' => $args['input']['body'],
      'field_codigo_de_seguimient' => $codigo_seguimiento,
      'field_categoria_reporte' => $args['input']['field_categoria_reporte'],
      'field_subcategoria_reporte' => $args['input']['field_subcategoria_reporte'],
      'field_latitud' => $args['input']['field_latitud'],
      'field_longitud' => $args['input']['field_longitud'],
      'field_solicita_asesoria_o_apoyo' => $args['input']['field_solicita_asesoria_o_apoyo'],
      'field_lugar' => $args['input']['field_lugar'],
    ];
  }

}
