.. include:: /Includes.rst.txt

.. index:: Extbase; DataMapper

.. _extbase_domain_data_mapper:

==========
DataMapper
==========

The :php:`\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper` can be used
to map between an array representation of a :ref:`model <extbase_domain_model>`
and the actual model. It should be used in the context of a repository.

If no or no known UID is provided the :php:`DataMapper` creates a new
model containing the provided data. The result is similar to creating a new
model instance and setting the values.
