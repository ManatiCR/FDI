<?php

/**
 * @file
 * Defines a mutation to create a node reporte.
 */

namespace Drupal\fdi_default_content\Plugin\GraphQL\Mutations;

use Drupal\graphql\GraphQL\Type\InputObjectType;
use Drupal\graphql_core\Plugin\GraphQL\Mutations\Entity\CreateEntityBase;
use Youshido\GraphQL\Execution\ResolveInfo;
/**
 * Simple mutation for creating a new contacto node.
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
  protected function extractEntityInput(array $input_args, InputObjectType $input_type, ResolveInfo $info) {
    $codigo_seguimiento = 0;
    $result = 1;
    do {
      $codigo_seguimiento = substr(md5(uniqid(mt_rand(), true)), 0, 8);
      $query = \Drupal::service('entity.query')
        ->get('node')
        ->condition('type', 'reporte')
        ->condition('field_codigo_de_seguimient', $codigo_seguimiento);
      $result = $query->execute();
    } while (count($result) > 0);
    return [
      'title' => $input_args['title'],
      'field_correo' => $input_args['field_correo'],
      'body' => $input_args['body'],
      'field_codigo_de_seguimient' => $codigo_seguimiento,
      'field_categoria_reporte' => $input_args['field_categoria_reporte'],
      'field_subcategoria_reporte' => $input_args['field_subcategoria_reporte'],
      'field_latitud' => $input_args['field_latitud'],
      'field_longitud' => $input_args['field_longitud'],
      'field_solicita_asesoria_o_apoyo' => $input_args['field_solicita_asesoria_o_apoyo'],
      'field_lugar' => $input_args['field_lugar'],
    ];
  }

}
