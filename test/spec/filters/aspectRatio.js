'use strict';

describe('Filter: aspectRatio', function () {

  // load the filter's module
  beforeEach(module('ngCommongoodApp'));

  // initialize a new instance of the filter before each test
  var aspectRatio;
  beforeEach(inject(function ($filter) {
    aspectRatio = $filter('aspectRatio');
  }));

  it('should return the input prefixed with "aspectRatio filter:"', function () {
    var text = 'angularjs';
    expect(aspectRatio(text)).toBe('aspectRatio filter: ' + text);
  });

});
